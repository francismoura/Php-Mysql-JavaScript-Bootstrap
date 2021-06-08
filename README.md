(Em andamento!)

# **Projeto CRUD com: Bootstrap, JS, PHP & MySQL**

### **Operações Básicas de Criação Leitura Exclusão Atualização usando requisições Ajax no JavaScript com API Fetch e backend PHP-PDO-MySQL**

Este é um sistema simples de cadastro e gestão de solicitações ao "setor de TI", desenvolvido para estudos.


## **Descrição do caso:**

    1. Banco de dados: 
    
        a. Mysql com as interações utilizando PDO.
        b. Dados coletados: código do cliente, nome, celular, e-mail, rua, nº, bairro, cidade, cep, estado, 
           tipo de cliente (aluno, professor, técnico administrativo), setor, curso, identificador da solicitação, 
           serviço solicitado, data da solicitação.
        c. Todos os campos são obrigatórios.

    2. Codificação:

        a. Formulário de solicitação:

            ▪ O cliente ao acessar o formulário de solicitação deve preencher todos os campos (que são obrigatórios).

            ▪ O cliente ao digitar o campo código do cliente, o sistema deve realizar uma busca no banco e caso já 
              existe o registro (código deve ser único), preencher automaticamente todos os demais campos (exceto o 
              campo solicitação de serviço). Caso seja um cliente novo, ou seja, este nunca realizou uma solicitação de 
              serviço, o sistema deve cadastrá-lo já também com a solicitação de serviço.
            ▪ Ao retornar os dados de um cliente já existente e o mesmo deseje alterar algum dado cadastral, o sistema 
              deve permitir a ação (respeitando o código do cliente que deve ser único) .
            ▪ Ao selecionar o campo tipo de cliente (aluno, professor, técnico administrativo), o campo código do 
              cliente deve respeitar os seguintes critérios:
                1. Aluno: código com sete dígitos.
                2. Professor: código com quatro dígitos.
                3. Técnico: código com seis.   
            ▪ O campo celular deve respeitar a quantidade de dígitos (99)99999-9999.
            ▪ O campo e-mail deve ser um e-mail válido.
            ▪ O campo cep deve respeitar os dígitos 999999-999.
            ▪ Ao final do cadastro, o sistema deve armazenar o registro no banco e enviar um e-mail para o suporte, informando
              sobre a nova solicitação e os respectivos dados preenchidos no formulário.
            ▪ Em caso de sucesso (inclusão no banco e envio de e-mail) o sistema deve retornar a mensagem: 
              “Sua solicitação foi enviada com sucesso! O setor de TI já está acompanhando sua demanda e em breve 
              entrará em contato pelo telefone: exibir o telefone cadastrado ou pelo e-mail: exibir o e-mail cadastrado”.
            ▪ Em caso de erro, deve-se retornar ao cliente a mensagem o alertando dos problemas ou as correções necessárias.
            
        b. Administração de solicitações:
        
            ▪ Não será necessário criar área de login ou boas práticas de controle de perfil e acesso. 
            ▪ Ao acessar o link do sistema/administracao, este deve exibir a lista das solicitações identificando os 
              usuários, identificador da solicitação, data da inclusão, tipo de usuário, telefone e e-mail.
            ▪ Deve permitir a visualização da demanda.
            ▪ Deve permitir a alteração dos dados do cliente e da solicitação (respeitando o código do cliente que deve ser único).
            ▪ Permitir a exclusão do cliente e suas demandas.
            ▪ Permitir a exclusão apenas das demandas.
            ▪ Não deve permitir a exclusão do cliente caso não sejam excluídas as demandas. 

    3. Todas as ações de CRUD devem ser realizadas utilizando Ajax, evitando o refresh das páginas. 
    4. O sistema deve possuir validações em PHP e JavaScript.
    5. Para estilização do sistema deve-se adotar Bootstrap, MaterializeCSS ou algum similar.
    6. Para o desenvolvimento PHP, codifique da forma desejada, porém sem utilização de frameworks.
    7. O sistema deve ser visionado no Github ou Bitbucket com instruções claras para implementação posterior em ambiente
       local.
      
      
## **Configuração do Projeto:**

1. Executar a script /database/solicitacao.sql em uma ferramenta de banco de dados relacionais (Workbench, DBeaver, phpMyAdmin, etc).

2. Editar o arquivo /config/config.php:
    
    define('DB_HOST', 'nomeDoDominioOuIP:Porta');
    define('DB_NAME', 'nomeDaTabela');
    define('DB_USER', 'usuarioDoMysql');
    define('DB_PASS', 'senhaDoUsuario');  
    
3. Ativar modo de reescrita de URL (mod_rewrite) no Apache:

    Passo 1: Verificar os módulos que estão ativados no servidor Apache.

    `$ cd /etc/apache2/mods-enabled/`    
    `$ ls`

    Se não existir um módulo denominado "rewrite.load" na pasta, basta ir para o passo 2, caso exista, basta ir para passo 3.

    Passo 2: Habilitando o módulo rewrite.load no Apache:

    `$ sudo a2enmod rewrite`

    Agora vamos partir para a alteração do arquivo de configuração do Apache, no passo 3.
    
    Passo 3: Alterando o arquivo de configuração do Apache, para consolidar o uso da "URL amigável".
    
    `$ sudo nano /etc/apache2/apache2.conf`
    
    Encontre o seguinte código:
    
        <Directory /var/www/>
           Options Indexes FollowSymLinks
           AllowOverride None
           Require all granted
        </Directory>
    
    Altere para:   
    
        <Directory /var/www/>
           Options Indexes FollowSymLinks
           AllowOverride All
           Require all granted
        </Directory>
        
    Passo 4: Reinicializar o servidor Apache.
     
    `$ sudo /etc/init.d/apache2 restart`      
