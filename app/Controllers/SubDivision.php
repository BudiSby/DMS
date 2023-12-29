<?php

namespace App\Controllers;

class SubDivision extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    private $model;
    private $link = 'subdivision';
    private $view = 'subdivision';
    private $title = 'Sub - Division';

    public function __construct()
    {
        $this->model = new \App\Models\SubDivisionModel();
    }

    public function index()
    {
        $listperpage = 5;
        $div_name_selected = "";
        $description_selected = "";
        $subdiv_name_selected = "";
        $keyword_use = "";
        $keyword =  "";
        if (($this->request->getVar('findby')) == null) {
            $findby =  "nosubdiv > ";
            $keyword_use =  0;
        } else {
            $findby =  $this->request->getVar('findby');
            $findby = $findby . ' like ';
            if (($this->request->getVar('keyword')) == null) {
                $keyword =  "%";
            } else {
                $keyword =  $this->request->getVar('keyword');
            }

            if (($this->request->getVar('findby')) == "div_name") {
                $div_name_selected = "selected='selected'";
                $description_selected = "";
                $subdiv_name_selected = "";
            } elseif (($this->request->getVar('findby')) == "description") {
                $div_name_selected = "";
                $description_selected = "selected='selected'";
                $subdiv_name_selected = "";
            } {
                $div_name_selected = "";
                $description_selected = "";
                $subdiv_name_selected = "selected='selected'";
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

            'page' => $pagex,
            //'data' => $this->model->select('*')->where($findby, $keyword_use)->paginate($listperpage),
            //'data' => $this->model->select('doc.*,div_name')->join('division', 'doc.nodiv = division.nodiv')->where($findby, $keyword_use)->paginate($listperpage),
            'data' => $this->model->select('sub_division.*,div_name,description')->join('division', 'sub_division.nodiv = division.nodiv')->where($findby, $keyword_use)->paginate($listperpage),
            'pager' => $this->model->pager,
            'listperpage' => $listperpage,

            'findby' => $findby,
            'keyword' => $keyword,
            'div_name_selected' => $div_name_selected,
            'description_selected' => $description_selected,
            'subdiv_name_selected' => $subdiv_name_selected
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
            'division' => $this->model->getDivision(),
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
            'subdiv_name' => 'required|min_length[5]',
        ];

        $input = $this->request->getVar();

        if (!$this->validateData($input, $rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'subdiv_name' => htmlspecialchars($this->request->getVar('subdiv_name')),
            'nodiv' => htmlspecialchars($this->request->getVar('nodiv')),
        ];

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
            'division' => $this->model->getDivision(),
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

        $rules = [
            'subdiv_name' => 'required',
        ];

        $input = $this->request->getVar();

        if ($input['subdiv_name'] != $result['subdiv_name']) {
            $rules['subdiv_name'] = 'required|min_length[5]';
        }

        if (!$this->validateData($input, $rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'subdiv_name' => htmlspecialchars($this->request->getVar('subdiv_name')),
            'nodiv' => htmlspecialchars($this->request->getVar('nodiv')),
        ];

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
