<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="favicon.ico">
    <title>Marcar Consulta</title>
</head>
<body>
    <!-- <nav>
       
    </nav> -->

    <div id="app" class="form">
        
        <div class="layer">
            <div class="logo">
                <a href="#"><img src="img/logo-horiz.png" alt="logo" style="width: 200px;"></a>
            </div>

            <div class="title">
                <h1>Formulário de Marcação de Consulta</h1>
            </div>

            

            <div class="data">
                <div class="dados pessoal">
                    <h1>Dados Pessoais</h1>
                </div>

                <div class="coli name">
                    <h2 class="obrigatorio">Nome</h2>
                    <input type="text" placeholder="Nome Completo" v-model="nome">
                      
                </div>

                <div class="coli numero-bi-cni">
                    <h2 class="obrigatorio">Numero de Documento</h2>
                    <input v-model="n_doc" type="text" placeholder="CNI/BI">
                </div>
                
                <div class="coli bi-cni">
                    <h2>Documento Pessoal</h2>
                    <input @change="e =>{getDoc(e,doc)}" type="file" id="real-file" placeholder="CNI/BI" accept=".pdf, img" hidden="hidden">
                    <button id="custom-button">Escolha o Arquivo</button>
                    <label for="file" id="custom-text"> Nenhum Ficheiro Carregado</label>
                    <label id="descricao" for="">// Foto CNI ou BI</label>
                </div>
            

                <div class="coli email">
                    <h2>Email</h2>
                    <input type="email" name="" id="" placeholder="Email">
                </div>
                
                <div class="coli address">
                    <h2 class="obrigatorio">Endereço</h2>
                    <input type="text" placeholder="Endereço">
                </div>

                <div class="coli tel">
                    <h2 class="obrigatorio">Telefone</h2>
                    <input id="" type="tel" name="" id="" placeholder="Telefone/Telemovel">
                </div>

                <div class="dados consulta">
                    <h1>Dados de consulta</h1>
                </div>

                <div class="coli bi-cni">
                    <h2 class="obrigatorio">Requerimento Médico</h2>
                    <input  type="file" id="real-file" accept=".pdf" hidden="hidden">
                    <button id="custom-button">Escolha o Arquivo</button>
                    <label for="file"id="custom-text"> Nenhum Ficheiro Carregado</label>
                    <label id="descricao" for="">// Imagem de Requesicao Médica</label>
                    
                </div>

            </div>
            
            <div class="submit-button">
                <a @click.prevent="submeter" href="#">Submeter</a>
                <!-- <button>Submeter</button> -->
            </div>

            

        </div>
            


    </div>
<!-- </div> -->
    <script src="static/main.js"></script>  


    <script type="text/javascript">
        const fileBtn = document.getElementById("real-file");
        const customBtn = document.getElementById("custom-button");
        const customText = document.getElementById("custom-text");
        const des = document.getElementById("descricao");

        

        customBtn.addEventListener("click", function(){
            fileBtn.click();
        })

        fileBtn.addEventListener("change", function (){
            if(fileBtn.value){
                let val = fileBtn.value.split("\\");
                customText.innerHTML = val[val.length-1];
                des.style.display = "none";

            }else{
                customText.innerHTML = "Ficheiro não selecionado"

            }
        })

    </script>

</body>
</html>