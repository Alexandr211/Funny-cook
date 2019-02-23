<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Dishes;

/**
 * ContactForm is the model behind the contact form.
 */
class Search extends Model
{
    // to render the dishes with the all appropriate ingredients selected
    public static function sql_all($dishes)
    {   
        $sql_all = Dishes::find()
            ->filterWhere(['AND',
                           
            ['in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ['in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ['in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ['in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ['in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]     
            ])
            ->orderBy('dish')
              
           ->all();
        
        return $sql_all;
    }
    
    // to render the dishes with 4 of 5 coincidenced ingredients
    public function sql_4($dishes)
    {
        $sql_4 = Dishes::find()
            ->filterWhere(['OR',
                           ['AND',                         
            ['in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                 
            ['not in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]], 
                            
            ],
                          ['AND',                           
            ['in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                 
            ['not in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]], 
            ],
                           ['AND',                           
            ['in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                  
            ['in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                 
            ['not in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                 
            ],
                           ['AND',                          
            ['in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                 
            ['not in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                 
            ],
                           ['AND',                       
            ['in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                  
            ['in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                  
            ['in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                 
            ['not in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                 
            ],
                          ]);
        
        return $sql_4;
    }
    
    // to render the dishes with 3 of 5 coincidenced ingredients
    public function sql_3($dishes)
    {
       $sql_3 = Dishes::find()
            ->filterWhere(['OR',
                           ['AND',                
            ['in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],             
            ['not in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['not in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ],
                           ['AND',                           
            ['in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                 
            ['not in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['not in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ],
                           ['AND',                       
            ['in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                 
            ['not in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['not in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ],
                           ['AND',                            
            ['in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                 
            ['not in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['not in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ],
                           ['AND',                           
            ['in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                  
            ['in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                 
            ['not in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['not in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ],
                           ['AND',                          
            ['in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                 
            ['not in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['not in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ],
                           ['AND',                           
            ['in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                 
            ['not in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['not in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ],
                           ['AND',                       
            ['in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                 
            ['not in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['not in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ],
                           ['AND',                        
            ['in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                  
            ['in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                 
            ['not in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['not in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ],
                           ['AND',                     
            ['in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                 
            ['not in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['not in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ],
                           
                        ]);
        return $sql_3;
    }
    
    // to render the dishes with 2 of 5 coincidenced ingredients
    public function sql_2($dishes)
    {
       $sql_2 = Dishes::find()
            ->filterWhere(['OR',
                           ['AND',                
                 ['AND', ['not in', 'ingredient1', [1]], 
            ['in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]],
                 ['AND', ['not in', 'ingredient2', [1]],           
            ['in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]],
            ['not in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],             
            ['not in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['not in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
                           ],                                   
                          ['AND',
                ['AND', ['not in', 'ingredient1', [1]],
            ['in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]],
            ['not in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
               ['AND', ['not in', 'ingredient3', [1]],            
            ['in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]],             
            ['not in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['not in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ],                           
                          ['AND',
            ['not in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
                ['AND', ['not in', 'ingredient2', [1]], 
            ['in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]],
                ['AND', ['not in', 'ingredient3', [1]],           
            ['in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]],             
            ['not in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],                   
            ['not in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ],                         
                        ['AND',
            ['not in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
                ['AND', ['not in', 'ingredient2', [1]], 
            ['in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]],
            ['not in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
                ['AND', ['not in', 'ingredient4', [1]],         
            ['in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]],                 
            ['not in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ],                         
                        ['AND',
            ['not in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ['not in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
                ['AND', ['not in', 'ingredient3', [1]],
            ['in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]],
                ['AND', ['not in', 'ingredient4', [1]],         
            ['in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]],                 
            ['not in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ],                       
                        ['AND',
            ['not in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ['not in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
                ['AND', ['not in', 'ingredient3', [1]],
            ['in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]],             
            ['not in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
                ['AND', ['not in', 'ingredient5', [1]],         
            ['in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]],
            ],                        
                        ['AND',
            ['not in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ['not in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ['not in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
                ['AND', ['not in', 'ingredient4', [1]],
            ['in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]],
                ['AND', ['not in', 'ingredient5', [1]],         
            ['in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]],
            ],                                   
                        ['AND',
                ['AND', ['not in', 'ingredient1', [1]],
            ['in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]],
            ['not in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ['not in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],             
            ['not in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
               ['AND', ['not in', 'ingredient5', [1]],          
            ['in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]],
            ],                                 
                        ['AND',
                ['AND', ['not in', 'ingredient1', [1]],
            ['in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]],
            ['not in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ['not in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
                 ['AND', ['not in', 'ingredient4', [1]],        
            ['in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]],                 
            ['not in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ],                          
                        ['AND',
            ['not in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
                ['AND', ['not in', 'ingredient2', [1]],
            ['in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]],
            ['not in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],             
            ['not in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
                 ['AND', ['not in', 'ingredient5', [1]],        
            ['in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]],
            ],                                    
                           ]);
            
        return $sql_2;
        
    }
}