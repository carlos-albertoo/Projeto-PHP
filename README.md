🧮 Calculadora em PHP e JavaScript

Um projeto de calculadora web simples, construído com foco no processamento backend usando PHP, juntamente com HTML e JavaScript para a interface e interatividade do usuário.

📁 Estrutura de Arquivos:

/projeto-php
├── 📄 calculadora.php
└── 🎨 style.css

🚀 Funcionalidades Principais:

- Operações Aritméticas: Suporta as quatro operações básicas (soma, subtração, multiplicação e divisão).
- Processamento Backend: Toda a lógica de cálculo é tratada de forma segura no lado do servidor usando PHP.
- Validação de Segurança: Inclui validações em PHP para:
- Prevenir a inserção de caracteres não numéricos ou operações inválidas (usando Regex).
- Tratar especificamente a divisão por zero (ex: 10/0).
- Capturar erros de sintaxe (ex: 5++3).
- Lidar com resultados infinitos ou indefinidos (ex: 0/0).

🌗 Alternador de Tema (Dark/Light Mode):

- Um botão permite ao usuário alternar entre um tema claro e escuro.

- A preferência de tema é salva no localStorage do navegador, para que a escolha seja lembrada na próxima visita.

Melhoria de UX (JavaScript):

- Permite que o usuário pressione a tecla "Enter" no teclado quando estiver no visor para acionar o botão "Calcular" (=).

🛠️ Tecnologias Utilizadas:

- Backend: PHP
- Frontend: HTML5
- Estilização: CSS3 (vinculado via style.css)
- Interatividade: JavaScript (Vanilla)

⚙️ Como Funciona a Lógica:

- O projeto é centrado no arquivo calculadora.php, que contém toda a lógica de HTML, PHP e JavaScript. O arquivo style.css é responsável por toda a estilização visual.

Interface (HTML): 

- Dentro de calculadora.php, a calculadora é um <form> HTML com method="post". Todos os botões (números, operadores, "C", "=") são do tipo type="submit".

Entrada do Usuário (PHP):

- Quando um botão name="botao" (números, operadores, "C") é clicado, o formulário é enviado para o próprio calculadora.php.

- O PHP captura o valor do botão e o concatena na string do visor ($visor).

- Se o botão for "C", o visor é limpo.

- O PHP então injeta um script JavaScript (echo "<script>...") na resposta para atualizar o valor do visor no lado do cliente.

Cálculo (PHP):

- Quando o botão name="calcular" (=) é clicado, o formulário é enviado.
- O PHP pega a string completa do visor.
- Ele passa a string por várias validações de segurança (descritas nas funcionalidades) antes de tentar calcular.
- Se a string for segura, o PHP usa a função eval() (com supressão de erros @) para computar o resultado matemático.
- O resultado (ou uma mensagem de erro) é enviado de volta ao visor da mesma forma, usando echo "<script>...".

🚀 Como Executar:

Como este projeto utiliza PHP para o backend, ele não funcionará apenas abrindo o arquivo calculadora.php diretamente no navegador.

Você precisa de um ambiente de servidor local com suporte a PHP:

- Instale um ambiente como XAMPP.
- Clone ou baixe este repositório.
- Mova a pasta do projeto (que se chama projeto-php) para o diretório htdocs (no XAMPP) ou www (no WAMP/MAMP).
- Inicie o servidor Apache no seu painel de controle (XAMPP).
- Acesse o projeto no seu navegador através de http://localhost/projeto-php/calculadora.php.

VIDEO EXPLICATIVO DO PROJETO: https://youtu.be/CvP5owxA7i0?si=qMzDdWqKvVXBQPbf
