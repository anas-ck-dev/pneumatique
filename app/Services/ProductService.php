<?php

namespace App\Services;

use App\Category;

class ProductService{

    public function getAllSubCategories(Category $category)
    {
        
        $subCategories = [];

        // Process the current category and store its information in the array
        $subCategories[] = $category;

        // Get the subcategories of the current category
        $fils = $category->filsCategorys;

        // Recursively process subcategories and store their information in the array
        foreach ($fils as $fil) {
            $subCategories = array_merge($subCategories, $this->getAllSubCategories($fil));
        }

        return $subCategories;

        
    }
}