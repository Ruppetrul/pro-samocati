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

    public function create($product, $media_id)
    {
        $res = Product::whereRaw('id = (select max(`id`) from products)')->first();
        $product['sku'] = $res ? $res->id + 1 : 1;

        return $this->query()->create(array(
            'vendor_id' => 2, //hardcode
            'slug' => 'slug',
            'sku' => $product['sku'],
            'type' => 'item',
            'short_description' => $product['short_description'],
            'status' => 'active', // must be 'active' in dump CHECK
            'body' => $product['body'],
            'first_media_id' => $media_id,
            'count' => $product['count'],
            'title' => $product['name'],
            'price' => $product['price'],
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
