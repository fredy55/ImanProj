<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Article;

class Articles extends BaseController
{
    use ResponseTrait;
    
    /**ResponseTrait;
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        // return $this->respond($this->model->findAll());

        $model = new Article();
        $data = $model->findAll();
        // var_dump(['dffds'=>'dfasdfs']);
        return $this->respond([$data]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id)
    {
        $model = new Article();
        $data = $model->find($id);
        
        if(empty($data)){
            return $this->failNotFound('No article found!');
        }else{
            return $this->respond($data);
        }
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = [
            'title'=> 'required',
            'fulltext'=> 'required',
            'tag'=> 'required'
        ];

        if(!$this->validate($rules)){
            return $this->fail($this->validator->getErrors());
        }else{
            $data = [
                'title'=> $this->request->getVar('title'),
                'full_text'=> $this->request->getVar('fulltext'),
                'tag'=> $this->request->getVar('tag')
            ];

           $model = new Article();
           $model->save($data);
           return $this->respondCreated($data);
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update()
    {
        $id=$this->request->getVar('id');
        $model = new Article();
        $data = $model->find($id);
        
        if(empty($data)){
            return $this->failNotFound('No article found!');
        }

        $rules = [
            'title'=> 'required',
            'fulltext'=> 'required',
            'tag'=> 'required'
        ];

        if(!$this->validate($rules)){
            return $this->fail($this->validator->getErrors());
        }else{
            $data = [
                'title'=> $this->request->getVar('title'),
                'full_text'=> $this->request->getVar('fulltext'),
                'tag'=> $this->request->getVar('tag')
            ];

           $model = new Article();
           $model->update($id, $data);
           return $this->respondCreated($data);
        }

        return $this->respondCreated($data);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id)
    {
        $model = new Article();
        $data = $model->find($id);
        
        if(empty($data)){
            return $this->failNotFound('No article found!');
        }else{
            $model->delete($id);
        
           return $this->respondCreated(['Deleted successfully!']);
        }
    }
}
