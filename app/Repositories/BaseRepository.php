<?php


namespace App\Repositories;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Collection;

abstract class BaseRepository implements InterfaceRepository
{
    use Sluggable;

    abstract public function getModel();

    /** @return Model */
    public function getAll()
    {
        return $this->getModel()->all();
    }

    public function getById($id)
    {
        return $this->getModel()::find($id);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * @param Collection $image
     */
    public function uploadImage(Collection $image)
    {
        if ($image == null) return;

        Storage::delete("uploads/$this->image");
        $fileName = Str::random(10) . '.' . $image->extention();
        $image->saveAs('uploads', $fileName);

        $this->image = $fileName;
        $this->getModel()->save();
    }

    public function getImage()
    {
        if ($this->image == null) {
            return '/img/no-image.png';
        } else {
            return 'uploads/' . $this->image;
        }
    }
}
