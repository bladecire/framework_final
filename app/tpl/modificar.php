<section>
<h2>Modificar Usuario</h2>
<div>
    <form id="regform" name="formregister" method="post" action="<?= APP_W; ?>modificar/modificar">
        NombreCompania<br>
        <input type="text" name="NombreCompania"><br>
        DNI<br>
        <input type="text" name="DNI"><br>
        Email<br>
        <input type="text" name="Email"><br>            
        NombreContacto<br>
        <input type="text" name="NombreContacto"><br>
        CargoContacto<br>
        <input type="text" name="CargoContacto"><br>
        Direccion<br>
        <input type="text" name="Direccion"><br>
        Ciudad<br>
        <input type="text" name="Ciudad"><br>
        Region<br>
        <input type="text" name="Region"><br>
        CodPostal<br>
        <input type="text" name="CodPostal"><br>
        Pais<br>
        <input type="text" name="Pais"><br>
        Telefono<br>
        <input type="text" name="Telefono"><br>
        Fax<br>
        <input type="text" name="Fax"><br>
        Usuario<br>
        <input type="text" name="Usuario"><br>
        Password<br>
        <input type="text" name="Password"><br>
        Rol<br>
        <input type="text" name="Rol"><br>            
        <input type="hidden" name="submitted" value="1">
        <input id="no" type="submit" value="Modificar" id="regsend">
    </form>    
</div>
</section>
