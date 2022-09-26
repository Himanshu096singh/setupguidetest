<?php 
namespace App\Traits;
use Illuminate\Http\Request;

trait ImageTrait{
    public function verifyAndUpload(Request $request, $fieldname='image', $directory='upload'){
       if($request->hasFile($fieldname)){
           
            if(!$request->file($fieldname)->isValid()){
                flash('Invalid Image!')->error()->important();
            }
            //  $request->file($fieldname)->store($directory,'public');
                $imgName = $request->file($fieldname)->getClientOriginalName();
                $file = pathinfo($imgName, PATHINFO_FILENAME);
                $ext = pathinfo($imgName, PATHINFO_EXTENSION);
                $slugimg = uniqid() . '_' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $file)));
                $imgName = strtolower($slugimg . '.' . $ext);
                $imgUrl = $directory.'/'. strtolower($imgName);
                $request->$fieldname->move(public_path($directory), $imgName);
                return $imgUrl;
        }
        return null;
    }

    // public function verifyAndUpload2(Request $request1, $fieldname1='image', $directory1='upload'){
    //     if($request1->hasFile($fieldname1)){
            
    //          if(!$request1->file($fieldname1)->isValid()){
    //              flash('Invalid Image!')->error()->important();
    //          }
    //          //  $request->file($fieldname)->store($directory,'public');
    //              $imgName1 = $request1->file($fieldname1)->getClientOriginalName();
    //              $file = pathinfo($imgName1, PATHINFO_FILENAME);
    //              $ext = pathinfo($imgName1, PATHINFO_EXTENSION);
    //              $slugimg1 = uniqid() . '_' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $file)));
    //              $imgName1 = strtolower($slugimg1 . '.' . $ext);
    //              $imgUrl1 = $directory1.'/'. strtolower($imgName1);
    //              $request1->image->move(public_path($directory1), $imgName1);
    //              return $imgUrl1;
    //      }
    //      return null;
    //  }
}
?> 