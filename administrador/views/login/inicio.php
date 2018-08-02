<section class="errores"><?php core\Notification::instancia()->imprimir(); ?></section>

<form id="form" class="form-login" method="post" action="./?c=login&a=login"> 
    <!--Usuario-->
    <label name="username">Usuario:</label>
    <input id="username" class="element-form" type="text" name="username" placeholder="Usuario">
    <!--Password-->
    <label name="password">Password:</label>
    <input id="password" class="element-form" type="password" name="password" placeholder="Password">    
    <article class="button-form-container">
        <input class="button-form" id="login" type="submit" name="login" value="Login">        
    </article>
</form>

<style type="text/css">
  @import url("./css/formularios/formularios.css");
</style>

<style type="text/css">

body{    
    background-color: #243036;
}
.form-login{
    margin-top: 100px;
    background-color: #ffffff;
    padding: 20px;
    box-shadow: 0.25em 0.063em 1.375em 0.1875em #454a33;
}
.element-form{
    height: 35px;
}
.errores{
    color: #fff;
    font-weight: bold;
}
</style>