<?php
namespace App\Service\Category;

interface CategoryInterface {
    public function storeCategory(array $data, $image);
    public function updateCategory(array $data, $image, $slug);
    public function getAllCategories();
    public function getCategoryBySlug($slug);
    public function deleteCat($slug);
    
    
    
}