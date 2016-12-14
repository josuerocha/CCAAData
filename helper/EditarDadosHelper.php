<?PHP
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
	        case 'save':
			$pessoaControl = new PessoaController();
			$pessoa = new Pessoa();

			$enderecoControl = new EnderecoController();
			$endereco = new Endereco();

			$loginControl = new LoginController();
			$login = new Login();

			if(isset($_POST["inputNome"])){
				if(isset($_POST["codeHidden"])){
					$pessoa->setCode($_POST["codeHidden"]);
					
					if(isset($_POST["codeEndHidden"])){
						$pessoa->endereco->setCode($_POST["codeEndHidden"]);
					}
				}

			    $pessoa->setFKPerfil($_POST["perfil"]);
                $pessoa->setNome($_POST["inputNome"]);
                $pessoa->setCPF($_POST["cpf"]);
                $pessoa->setTelefone($_POST["inputTel"]);
                $pessoa->setCelular($_POST["inputCel"]);
                $pessoa->setEmail($_POST["email"]);
                $pessoa->setDataNascimento($_POST["dtNasc"]);
                $pessoa->setSexo($_POST["sexo"]);

                $endereco->setCep($_POST["cep"]);
                $endereco->setNumero($_POST["num"]);
                $endereco->setLogradouro($_POST["logradouro"]);
                $endereco->setComplemento($_POST["compl"]);
                $endereco->setBairro($_POST["bairro"]);
                $endereco->setCidade($_POST["cidade"]);
                $endereco->setUF($_POST["uf"]);

                $login->setEmail($_POST["email"]);
                $login->setSenha(MD5('unconfirmed'));

                if ($_FILES['image']['size'] == 0 && $_FILES['image']['error'] == 0)
			{
    			echo "Empty file";
			}
			else{
				$target_dir = "../users/pictures/";
				$uploadOk = 1;
				
			    $check = getimagesize($_FILES["image"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }

			    if ($uploadOk == 0) {
    				echo "Sorry, your file was not uploaded.";
					// if everything is ok, try to upload file
				} else {

					$temp = explode(".", $_FILES["image"]["name"]);
					$newfilename = $pessoa->getEmail() . '.' . end($temp);
    				
    				if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $newfilename)) {
        				echo "The file ". $target_dir . $newfilename. " has been uploaded.";
        				$pessoa->setFoto($newfilename);
    				} 

    				else {
        				echo "Sorry, there was an error uploading your file.";
    				}
				}
			
			}

            }
            if($pessoaControl->Save($pessoa) && $loginControl->Save($login)){

            	$endereco->setCodePessoa($pessoa->getCode());
            	if($enderecoControl->Save($endereco)){

				echo "<script>alert('Registro salvo com sucesso!');</script>"; 
				}
				else{
					echo "<script>alert('Erro ao salvar endereço!');</script>";
				}
			}

			else{		
				echo "<script>alert('Erro ao salvar o registro.');</script>";
			}						
			echo "<script>location.href='../pages/cadastro_pessoa.php';</script>";
		break;	
		
		default:
		   echo "<script> location.href='../cadastro_pessoa.php';</script>";
		break;
	}	




?>