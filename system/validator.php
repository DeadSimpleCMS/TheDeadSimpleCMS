<?php
/**
 * validator.php
 *
 * Created By monstertke
 * Date: 3/26/13
 * Time: 7:47 PM
 *
 * Copyright (c) 2013 monstertke
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated 
 * documentation files (the "Software"), to deal in the Software without restriction, including without limitation the 
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to  
 * permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the 
 * Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE 
 * WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR 
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, 
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE 
 * SOFTWARE.
 */

namespace DeadSimpleCMS;


class Validator {
    function string($string, $rules, $min_limit = 0, $max_limit = 0 )
    {
        if(self::string($string, array( 'format'     => $this->return_rules($rules),
                                        'min_length' => $min_limit,
                                        'max_length' => $max_limit)))
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    function return_rules($r)
    {
        $expand = explode('|', $r);
        $return_rules = array();

        $rules = array(
            'alpha'         => VALIDATE_ALPHA,
            'punctuation'   => VALIDATE_PUNCTUATION,
            'numbers'       => VALIDATE_NUM,
            'space'         => VALIDATE_SPACE,
            'upper'         => VALIDATE_ALPHA_UPPER,
            'lower'         => VALIDATE_ALPHA_LOWER,
            'name'          => VALIDATE_NAME,
            'street'        => VALIDATE_STREET,
        );

        foreach($expand as $v)
        {
            if (array_key_exists($v, $rules))
            {
                array_push($return_rules, $rules[$v]);
            }

        }
        return implode(' . ' , $return_rules);
    }
}