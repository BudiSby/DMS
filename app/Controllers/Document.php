<?php

namespace App\Controllers;

class Document extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    private $model;
    private $link = 'document';
    private $view = 'document';
    private $title = 'Document';
    private $dir = 'public/assets/uploads/documents';
    public function __construct()
    {
        $this->model = new \App\Models\DocumentModel();
    }

    public function index()
    {
        $listperpage = 5;
        $doc_name_selected = "";
        $description_selected = "";
        $keyword_use = "";
        $keyword =  "";
        if (($this->request->getVar('findby')) == null) {
            $findby =  "nodoc > ";
            $keyword_use =  0;
        } else {
            $findby =  $this->request->getVar('findby');
            $findby = $findby . ' like ';
            if (($this->request->getVar('keyword')) == null) {
                $keyword =  "%";
            } else {
                $keyword =  $this->request->getVar('keyword');
            }

            if (($this->request->getVar('findby')) == "doc_name") {
                $doc_name_selected = "selected='selected'";
                $description_selected = "";
            } else {
                $doc_name_selected = "";
                $description_selected = "selected='selected'";
            }
        }
        if ($keyword_use ==  "") {
            $keyword_use = '%' . $keyword . '%';
        }

        if (($this->request->getVar('page')) == null) {
            $pagex = 1;
        } else {

            $pagex = $this->request->getVar('page');
        }

        $data = [
            'title' => $this->title,
            'link' => $this->link,
            //'data' => $this->model->select('doc.*, doc_name')->findAll()

            'page' => $pagex,
            //'data' => $this->model->select('*')->where('nodoc >', '0')->paginate($listperpage),
            'data' => $this->model->select('*')->where($findby, $keyword_use)->paginate($listperpage),
            'pager' => $this->model->pager,
            'listperpage' => $listperpage,

            'findby' => $findby,
            'keyword' => $keyword,
            'doc_name_selected' => $doc_name_selected,
            'description_selected' => $description_selected
        ];

        return view($this->view . '/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return redirect()->to($this->link);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => $this->title,
            'link' => $this->link,
        ];

        return view($this->view . '/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */

    public function create()
    {
        $rules = [
            'doc_name' => 'required|min_length[8]',
            'description' => 'required|min_length[12]',
        ];

        $input = $this->request->getVar();

        if (!$this->validateData($input, $rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'doc_name' => htmlspecialchars($this->request->getVar('doc_name')),
            'description' => htmlspecialchars($this->request->getVar('description')),
        ];

        $dataBerkas = $this->request->getFile('xdoc');
        if ($dataBerkas->getError() != 4) {

            $fileName = $dataBerkas->getName();
            $fileExt = $dataBerkas->getExtension();

            $data['xdoc1_name'] = $fileName . '.' . $fileExt;


            $fileName = sha1(date("Y-m-d H:i:s"));
            $fileName = $fileName . '.' . $fileExt;

            $dataBerkas->move($this->dir, $fileName);

            $data['xdoc1'] = $fileName;
        }

        $res = $this->model->save($data);
        if ($res) {
            setAlert('success', 'Success', 'Add Success');
        } else {
            setAlert('warning', 'Warning', 'Add Failed');
        }

        return redirect()->to($this->link);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $result = $this->model->find($id);
        if (!$result) {
            setAlert('warning', 'Warning', 'NOT VALID');
            return redirect()->to($this->link);
        }

        $data = [
            'title' => $this->title,
            'link' => $this->link,
            'data' => $result,
        ];

        return view($this->view . '/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $result = $this->model->find($id);
        if (!$result) {
            setAlert('warning', 'Warning', 'NOT VALID');
            return redirect()->to($this->link);
        }

        $input = $this->request->getVar();

        if ($input['doc_name'] != $result['doc_name']) {
            $rules['doc_name'] = 'required|min_length[8]';
        }

        if ($input['description'] != '') {
            $rules['description'] = 'required|min_length[12]';
        }

        $dataBerkas = $this->request->getFile('xdoc');

        //if ($dataBerkas->getError() != 4) {
        //    $rules['xdoc'] = 'uploaded[image]|max_size[image,2048]|mime_in[image,image/png,image/jpeg]|ext_in[image,png,jpg,gif]|is_image[image]';
        //}


        if (!$this->validateData($input, $rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'doc_name' => htmlspecialchars($this->request->getVar('doc_name')),
            'description' => htmlspecialchars($this->request->getVar('description')),
        ];

        if ($dataBerkas->getError() != 4) {

            $fileName = $dataBerkas->getName();
            $fileExt = $dataBerkas->getExtension();

            $data['xdoc1_name'] = $fileName . '.' . $fileExt;


            $fileName = sha1(date("Y-m-d H:i:s"));
            $fileName = $fileName . '.' . $fileExt;

            $dataBerkas->move($this->dir, $fileName);

            $data['xdoc1'] = $fileName;

            if ($result['xdoc1'] != 'user.png') {
                @unlink($this->dir . '/' . $result['xdoc1']);
            }
        }

        $res = $this->model->update($id, $data);
        if ($res) {
            setAlert('success', 'Success', 'Edit Success');
        } else {
            setAlert('warning', 'Warning', 'Edit Failed');
        }

        return redirect()->to($this->link);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $result = $this->model->find($id);
        if (!$result) {
            setAlert('warning', 'Warning', 'NOT VALID');
            return redirect()->to($this->link);
        }

        if ($result['xdoc1'] != 'user.png') {
            @unlink($this->dir . '/' . $result['xdoc1']);
        }

        $res = $this->model->delete($id);
        if ($res) {
            setAlert('success', 'Success', 'Delete Success');
        } else {
            setAlert('warning', 'Warning', 'Delete Failed');
        }

        return redirect()->to($this->link);
    }

    public function active($id = null, $active = null)
    {
        if ($id == null || $active == null) {
            setAlert('warning', 'Warning', 'NOT VALID');
            return redirect()->to($this->link);
        }

        $result = $this->model->find($id);
        if (!$result) {
            setAlert('warning', 'Warning', 'NOT VALID');
            return redirect()->to($this->link);
        }

        $data = [
            'is_active' => $active
        ];

        $res = $this->model->update($id, $data);
        if ($res) {
            $title = ($active == 0) ? 'Non ' : '';
            setAlert('success', 'Success', $title . 'Active Success');
        } else {
            setAlert('warning', 'Warning', 'Active Failed');
        }
        return redirect()->to($this->link);
    }
}
