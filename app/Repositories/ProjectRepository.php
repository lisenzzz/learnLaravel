<?php
/**
 * Created by PhpStorm.
 * User: guyanting
 * Date: 2018/8/20
 * Time: 10:37
 */

namespace App\Repositories;

use App\Project;
use Image;

class ProjectRepository
{
    public function newProject($request){
        $request->user()->projects()->create([
            'name'=>$request->createName,
            'thumbnail'=>$this->thumbnail($request)
        ]);
    }

    public function thumbnail($request){
        if($request->hasFile('thumbnail')) {
            $file = $request->createThumbnail;
            $name = str_random(10) . ".jpg";
            $path = public_path() . "/thumbnails/" . $name;
            Image::make($file)->resize(261,98)->save($path);
            return $name;
        }
    }

    public function updateProject($request,$id){
        $project=Project::findOrFail($id);
        $project->name=$request->name;
        if($request->hasFile('thumbnail')){
               $project->thumbnail=$this->thumbnail($request);
        }
        $project->save();
    }
}