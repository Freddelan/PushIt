 <?php 
 function connectChat() {
    $base = mysql_connect('localhost', 'root', 'paradoxe0311');
    mysql_select_db ('chat', $base);
} 