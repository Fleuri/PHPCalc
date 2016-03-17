  <?php
                if(isset($_GET['script'])) {
                $arr = $_SESSION['history'];
                $tmpvalue = "";
                foreach ($arr as $value) {
                   echo $value;        
                }
             //   echo $tmpvalue;
                }
