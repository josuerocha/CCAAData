<?php
interface IControllerLogin{
    function Save($login);
      
    function Delete($login);

    function Validate($email, $senha);

    function ChangePassword($email, $novaSenha);

    }
?>