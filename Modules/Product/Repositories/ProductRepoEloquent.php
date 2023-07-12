<?php

namespace Modules\Product\Repositories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Modules\Product\Models\Product;

class ProductRepoEloquent implements ProductRepoEloquentInterface
{
    /**
     * Get latest products.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getAll()
    {
        return $this->query()->get();
    }

    /**
     * Get latest products.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getLatest()
    {
        return $this->query()->get();
    }

    /**
     * Find product by id.
     *
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function findById($id)
    {
        $res = $this->query()->with('categories')->findOrFail($id);
        return $res;
    }

    /**
     * Delete product by id.
     *
     * @param $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        return $this->query()->where('id', $id)->delete();
    }

    public function create(string $title, float $price, int $count, int $sku, int $media_id = null)
    {


        return $this->query()->create(array(
            'vendor_id' => 2, //hardcode
            'slug' => 'slug',
            'sku' => $sku,
            'type' => 'item',
            'short_description' => 'short_description',
            'status' => 'active', // must be 'active' in dump CHECK
            'body' => 'body',
            'first_media_id' => $media_id,

            'count' => $count,
            'title' => $title,
            'price' => $price,
        ));

        /*[
            'name'     => $data['name'],
            'email'    => $data['email'],
            'phone'    => $data['phone'],
            'type'     => $data['type'],
            'password' => Hash::make($data['password']),
        ]);*/
    }

    public function update($product_id, $product)
    {
        if (isset($product['image']) && !empty($product['image'])) {
            $image = $product['image'];
            $fileName = time() . '.' . $image->extension();
            $image->storeAs('public/images', $fileName);
        }
        $res = $this->query()->where('id', $product_id)->update($product);
        return $res;

        /* return $this->query()->where('id', $id)->update([
            'media_id'  => $data['media_id'],
            'link'      => $data['link'],
            'title'     => $data['title'],
            'location'  => $data['location'],
            'status'    => $data['status'],
        ]);*/
    }
    /**
     * Get query model (builder).
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function query()
    {
        return Product::query();
    }
}
