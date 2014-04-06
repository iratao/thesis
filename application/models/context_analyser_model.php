<?php

class Context_analyser_model extends CI_Model {
    var $context_factor_array;
    var $category_men;
    var $category_women;
    
    const WOMEN = 1;
    const MEN = 2;
    
    public function __construct(){
        
        $this->category_women = array(
            "Tops",
            "Dresses", 
            "Lingerie & Nightwear", 
            "Jumpers & Cardigans", 
            "Trousers & Leggings", 
            "Coats", 
            "Blouses & Tunics", 
            "Jackets", 
            "Skirts", 
            "Jeans", 
            "Tights & Socks", 
            "Swimwear"
        );
        
        $this->category_men = array(
            "T-Shirts", 
            "Shirts", 
            "Jackets", 
            "Underwear", 
            "Trousers & Chinos", 
            "Jumpers & Cardigans", 
            "Jeans", 
            "Socks", 
            "Suits & Ties", 
            "Coats", 
            "Swimwear"
        );
        
        $this->context_factor_array = array(
            // Imagine that you are a ...
            'budget' => array(
                'budget buyer',
                'high spender',
                'price for quality'
            ),
            // Imagine that you are shopping in morning time ...
            'time of the day' => array(
                'morning time',
                'afternoon',
                'night time'
            ),
            // Imagine that you are shopping at ...
            'day of the week' => array(
                'weekend',
                'working day'
            ),
            // Imagine that the clothes recommended is ...
            'distance' => array(
                'near by',
                'far away'
            ),
            // Imagine that you have
            'knowledge about the clothes' => array(
                'bought a similar clothes before',
                'never bought a similar clothes before'
            ),
            // Imagine that the shop is ...
            'crowdedness' => array(
                'crowded',
                'not crowded',
                'empty'
            ),
            // Imagine that you want to buy the clothes for ... purpose
            'intent of purchasing' => array(
                'work',
                'daily wear',
                'party',
                'sports',
                'other'
            ),
            // Imagine that you are ...
            'companion' => array(
                'with girl-/boy-friend',
                'with family',
                'with children',
                'alone',
                'with friends'
            ),
            // Imagine that the weather is ...
            'weather' => array(
                'snowing',
                'clear sky',
                'sunny',
                'raining',
                'cloudy'
            ),
            // Imagine that you are feeling ...
            'mood' => array(
                'shopaholic',
                'outdoorsy',
                'like a party animal',
                'normal'
            ),
            // Imagine the season is ...
            'season' => array(
                'spring',
                'summer',
                'autumn',
                'winter'
            ),
            // Imagine you go shopping by ...
            'transport' => array(
                'walking',
                'public transport',
                'bicycle',
                'car'
            ),
            'temperature' => array(
                'warm',
                'cold',
                'hot'
            ),
            'time available' => array(
                'half day',
                'one day'
            )
        );
    }
    
    public function test(){
        $mynum = "ss";
        return $mynum;
    }
    
    public function get_ran_context_factor_id(){
        // Make sure that ids in table context_factor is continuous and is from 1 to max;
        $query = $this->db->query("SELECT COUNT(*) AS num FROM context_factor;");
        $maxnum = $query->row()->num;
        return $this->statisticshelper->ran_uniform(1, $maxnum);
    }
    
    public function get_ran_context_value($fid){
        $query = $this->db->query("SELECT factor FROM context_factor WHERE id = $fid");
        $factor = $query->row()->factor;
        $values = $this->context_factor_array[$factor];
        $numvalue = count($values);
        $valueIndex = $this->statisticshelper->ran_uniform(0, $numvalue-1);
        return $values[$valueIndex];
        
    }
    
    public function get_ran_category($gender){
        $category = "";
        switch ($gender) {
            case Context_analyser_model::WOMEN:
                $num = count($this->category_women);
                $index = $this->statisticshelper->ran_uniform(0, $num-1);
                $category = $this->category_women[$index];
                break;
            case Context_analyser_model::MEN:
                $num = count($this->category_men);
                $index = $this->statisticshelper->ran_uniform(0, $num-1);
                $category = $this->category_men[$index];
                break;
            default:
                break;
        }
        return $category;
    }
    
    public function insert_categories_new(){
        foreach ($this->category_men as $value) {
            $data = array(
                'name' => $value,
                'gender' => 2
            );
            $this->db->insert('category_new', $data);
        }
        
        foreach ($this->category_women as $value) {
            $data = array(
                'name' => $value,
                'gender' => 1
            );
            $this->db->insert('category_new', $data);
        }
    }
    
    public function insert_context_values(){
        foreach ($this->context_factor_array as $key => $value) {
            $query = $this->db->query("SELECT id FROM context_factor WHERE factor = '$key'");
            $fid = $query->row()->id;
            foreach ($value as $v) {
                $data = array(
                    'fid' => $fid,
                    'value' => $v
                );
                $this->db->insert('context_value', $data);
            }
        }
    }
    
    public function insert_context_factors(){
        foreach ($this->context_factor_array as $key => $value) {
            $data = array(
               'factor' => $key
            );
            $this->db->insert('context_factor', $data); 
        }
    }
}
?>
