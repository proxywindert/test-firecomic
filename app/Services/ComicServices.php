<?php


namespace App\Services;

use App\Models\Comic as ComicModel;
use Google_Service_Drive_DriveFile;
use Google_Service_Drive_Permission;
use Illuminate\Support\Facades\Storage;

class ComicServices extends BaseServices
{
    public function __construct(ComicModel $model)
    {
        parent::__construct($model);
    }

    public function index($request)
    {
        $limit = $request->get('limit', ComicModel::LIMIT_PAGE);
        $query = $this->model;
        $hashtag = $request->get('hashtag');
        if ($hashtag && $hashtag != 'null') {
            $query = $query->whereHas('hashtags', function ($query) use ($hashtag) {
                $query->where('hashtags.slug', $hashtag);
            });
        }
        return $query->paginate($limit);
    }

    public function save(array $attributes)
    {
        if (!empty($attributes['comic_code'])) {
            $entity = $this->model->where('comic_code',$attributes['comic_code'])->first();
            if ($entity) {
                $entity->fill($attributes)->save();
                return $entity;
            } else {
                return null;
            }
        } else {
            $attributes['comic_code'] = "COMIC-" . $this->model->max('id') + 1;
            return $this->model->create($attributes);
        }
    }

    public function uploadGGDrive($request,&$comic)
    {
        $file = [];
        $file['link_banner']['file'] = $request->file('link_banner');
        $file['link_avatar']['file'] = $request->file('link_avatar');
        $file['link_comic_name']['file'] = $request->file('link_comic_name');
        $file['link_comic_small_name']['file'] = $request->file('link_comic_small_name');
        $file['link_bg']['file'] = $request->file('link_bg');

        $driveService = Storage::disk('google');

        $newPermission = new Google_Service_Drive_Permission();
        $newPermission->setType('anyone');
        $newPermission->setRole('reader');

        $folderId = file_get_contents(public_path() . '/token.txt');

        $fileToUpload = $this->postGGDrive($driveService, $file['link_avatar']['file'], $folderId);
        if ($fileToUpload) {
            $driveService->permissions->create($fileToUpload->id, $newPermission);

            $file['link_avatar']['url'] = 'https://lh3.googleusercontent.com/d/' . $fileToUpload->id . '=w1000';
        }


        $fileToUpload = $this->postGGDrive($driveService, $file['link_comic_name']['file'], $folderId);
        if ($fileToUpload) {
            $driveService->permissions->create($fileToUpload->id, $newPermission);

            $file['link_comic_name']['url'] = 'https://lh3.googleusercontent.com/d/' . $fileToUpload->id . '=w1000';
        }


        $fileToUpload = $this->postGGDrive($driveService, $file['link_bg']['file'], $folderId);
        if ($fileToUpload) {
            $driveService->permissions->create($fileToUpload->id, $newPermission);

            $file['link_bg']['url'] = 'https://lh3.googleusercontent.com/d/' . $fileToUpload->id . '=w1000';
        }


        $fileToUpload = $this->postGGDrive($driveService, $file['link_banner']['file'], $folderId);
        if ($fileToUpload) {
            $driveService->permissions->create($fileToUpload->id, $newPermission);

            $file['link_banner']['url'] = 'https://lh3.googleusercontent.com/d/' . $fileToUpload->id . '=w1000';
        }

        if(!empty($file['link_banner']['url'])){
            $comic['link_banner'] = $file['link_banner']['url'];
        }
        if(!empty($file['link_bg']['url'])){
            $comic['link_bg'] = $file['link_bg']['url'];
        }
        if(!empty($file['link_comic_name']['url'])){
            $comic['link_comic_name'] = $file['link_comic_name']['url'];
        }
        if(!empty($file['link_avatar']['url'])){
            $comic['link_avatar'] = $file['link_avatar']['url'];
        }

        return $file;
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

    public function show($comicCode)
    {
        $data = $this->model->with('chapters')->with('hashtags')->where('comic_code', $comicCode)->first();
        return $data;
    }

    public function delete($comicCode)
    {
        $entity = $this->model
            ->where('comic_code', $comicCode)->first();
        return !empty($entity) ? $entity->delete() : null;
    }
}
