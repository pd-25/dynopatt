<?php
namespace App\Service\Category;

interface CategoryInterface {
    public function storeCategory(array $data);
    public function updateCategory(array $data, $slug);
    public function getAllCategories();
    public function getCategoryBySlug($slug);
    public function deleteCat($slug);
    
    
    
}