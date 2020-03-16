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
    private function sql_all($dishes)
    {   
        $sql_all = Dishes::find()
            ->join('INNER JOIN', 'ingredients in1', 'in1.id = dishes.ingredient1')
            ->join('INNER JOIN', 'ingredients in2', 'in2.id = dishes.ingredient2')
            ->join('INNER JOIN', 'ingredients in3', 'in3.id = dishes.ingredient3')
            ->join('INNER JOIN', 'ingredients in4', 'in4.id = dishes.ingredient4')
            ->join('INNER JOIN', 'ingredients in5', 'in5.id = dishes.ingredient5')
            ->filterWhere(['AND',
                           
            ['in', 'ingredient1', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ['in', 'ingredient2', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ['in', 'ingredient3', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ['in', 'ingredient4', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]],
            ['in', 'ingredient5', [$dishes->ingredient1, $dishes->ingredient2, $dishes->ingredient3, $dishes->ingredient4, $dishes->ingredient5]]     
            ])
            ->andWhere('in1.visibility != 0')
            ->andWhere('in2.visibility != 0')
            ->andWhere('in3.visibility != 0')
            ->andWhere('in4.visibility != 0')
            ->andWhere('in5.visibility != 0')
            ->orderBy('dish')
              
           ->all();
        
        return $sql_all;
    }
    
    // to render the dishes with 4 of 5 coincidenced ingredients
    private function sql_4($dishes)
    {
        $sql_4 = Dishes::find()
            ->join('INNER JOIN', 'ingredients in1', 'in1.id = dishes.ingredient1')
            ->join('INNER JOIN', 'ingredients in2', 'in2.id = dishes.ingredient2')
            ->join('INNER JOIN', 'ingredients in3', 'in3.id = dishes.ingredient3')
            ->join('INNER JOIN', 'ingredients in4', 'in4.id = dishes.ingredient4')
            ->join('INNER JOIN', 'ingredients in5', 'in5.id = dishes.ingredient5')
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
                          ])
            ->andWhere('in1.visibility != 0')
            ->andWhere('in2.visibility != 0')
            ->andWhere('in3.visibility != 0')
            ->andWhere('in4.visibility != 0')
            ->andWhere('in5.visibility != 0')
            ->orderBy('dish')

            ->all();
        
        return $sql_4;
    }
    
    // to render the dishes with 3 of 5 coincidenced ingredients
    private function sql_3($dishes)
    {
       $sql_3 = Dishes::find()
           ->join('INNER JOIN', 'ingredients in1', 'in1.id = dishes.ingredient1')
           ->join('INNER JOIN', 'ingredients in2', 'in2.id = dishes.ingredient2')
           ->join('INNER JOIN', 'ingredients in3', 'in3.id = dishes.ingredient3')
           ->join('INNER JOIN', 'ingredients in4', 'in4.id = dishes.ingredient4')
           ->join('INNER JOIN', 'ingredients in5', 'in5.id = dishes.ingredient5')
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
                           
                        ])
           ->andWhere('in1.visibility != 0')
           ->andWhere('in2.visibility != 0')
           ->andWhere('in3.visibility != 0')
           ->andWhere('in4.visibility != 0')
           ->andWhere('in5.visibility != 0')
           ->orderBy('dish')

           ->all();
        return $sql_3;
    }
    
    // to render the dishes with 2 of 5 coincidenced ingredients
    private function sql_2($dishes)
    {
       $sql_2 = Dishes::find()
           ->join('INNER JOIN', 'ingredients in1', 'in1.id = dishes.ingredient1')
           ->join('INNER JOIN', 'ingredients in2', 'in2.id = dishes.ingredient2')
           ->join('INNER JOIN', 'ingredients in3', 'in3.id = dishes.ingredient3')
           ->join('INNER JOIN', 'ingredients in4', 'in4.id = dishes.ingredient4')
           ->join('INNER JOIN', 'ingredients in5', 'in5.id = dishes.ingredient5')
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
                           ])
           ->andWhere('in1.visibility != 0')
           ->andWhere('in2.visibility != 0')
           ->andWhere('in3.visibility != 0')
           ->andWhere('in4.visibility != 0')
           ->andWhere('in5.visibility != 0')
           ->orderBy('dish')

           ->all();
            
        return $sql_2;
        
    }

    public function searchAll(Dishes $dishes){
        $result_arr = [];

        if($dishes->ingredient1==1){
            $dishes->ingredient1=0;
        }
        if($dishes->ingredient2==1){
            $dishes->ingredient2=0;
        }
        if($dishes->ingredient3==1){
            $dishes->ingredient3=0;
        }
        if($dishes->ingredient4==1){
            $dishes->ingredient4=0;
        }
        if($dishes->ingredient5==1){
            $dishes->ingredient5=0;
        }

        $sql_all = $this->sql_all($dishes);
        if ($sql_all != null) {
            foreach ($sql_all as $sql_all_item) {
                $result_arr[] = $sql_all_item->dish;
            }
        }

        $sql_4 = $this->sql_4($dishes);
        if ($sql_4 != null) {
            foreach ($sql_4 as $sql_4_item) {
                $sql4 = $sql_4_item->dish;
                if (!in_array($sql4, $result_arr)) {
                    $result_arr[] = $sql_4_item->dish;
                }
            }
        }

        $sql_3 = $this->sql_3($dishes);
        if ($sql_3 != null) {
            foreach ($sql_3 as $sql_3_item) {
                $sql3 = $sql_3_item->dish;
                if (!in_array($sql3, $result_arr)) {
                    $result_arr[] = $sql_3_item->dish;
                }
            }
        }
        $sql_2 = $this->sql_2($dishes);
        if ($sql_2 != null) {
            foreach ($sql_2 as $sql_2_item) {
                $sql2 = $sql_2_item->dish;
                if (!in_array($sql2, $result_arr)) {
                    $result_arr[] = $sql_2_item->dish;
                }
            }
        }
        return $result_arr;
    }
}