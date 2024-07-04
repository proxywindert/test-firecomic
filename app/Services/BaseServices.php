<?php


namespace App\Services;
use App\Models\BaseModel as Model;
use Google_Service_Drive_DriveFile;
use Illuminate\Support\Facades\Storage;

class BaseServices
{
    public $model;



    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    protected function responseJson($message, $code = 200, $data=null)
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getGGId($url){
        $pattern = "/https:\/\/lh3.googleusercontent.com\/d\/(.*?)=w1000-rw/i";
        preg_match($pattern, $url,$matches);
        return $matches[1]??"";
    }

    public function deteleGGDrive($urls){
        try {
            $driveService = Storage::disk('google');
            $pattern = "/https:\/\/lh3.googleusercontent.com\/d\/(.*?)=w1000-rw/i";
            if(isset($urls)){
                foreach ($urls as $url){
                    preg_match($pattern, $url,$matches);
                    $folderId = $matches[1]??null;
                    if($folderId)
                        $driveService->files->delete($folderId);
                }
            }

        }catch (\Exception $e){

        }

        return true;
    }

    public function postGGDrive($driveService, $file, $folderId)
    {
        if (!$file) {
            return null;
        }
        $name = $file->getClientOriginalName();
        $type = $file->getClientMimeType();

        $content = file_get_contents($file->getRealPath());

        $fileMetadata = new Google_Service_Drive_DriveFile(array(
            'name' => $this->generateRandomString(15) . '_' . time() . '_' . $name,
            'parents' => array($folderId)));
        $file = $driveService->files->create($fileMetadata, array(
            'data' => $content,
            'mimeType' => $type,
            'uploadType' => 'multipart',
            'fields' => 'id'));
        return $file;
    }
}
