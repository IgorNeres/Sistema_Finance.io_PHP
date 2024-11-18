# Finance.io
<div style="alight-center;>
  <img src="https://github.com/user-attachments/assets/bc1298ec-3894-4e02-aad9-8ed01720dcae">
</div>

Este sistema foi desenvolvido para gerenciar clientes, fiados e produtos de uma empresa. O sistema permite um login único para acesso, onde o usuário tem acesso a três áreas principais: **Clientes**, **Fiados** e **Produtos**.

## Funcionalidades

### 1. **Login**
- O sistema possui um login simples, onde o usuário deve fornecer **usuário** e **senha**.
- Há apenas **um usuário** no sistema, com login único, o que garante que apenas a pessoa com as credenciais corretas possa acessar a plataforma.

### 2. **Menu Principal**
Após o login, o sistema apresenta um menu com três opções:
- **Clientes**: Gerenciar informações dos clientes cadastrados.
- **Fiados**: Controlar as dívidas dos clientes.
- **Produtos**: Gerenciar o estoque de produtos e calcular os preços sugeridos.

---

## **1. Clientes**

Na seção de **Clientes**, o usuário pode realizar as seguintes operações:

### Funcionalidades:
- **Cadastrar Cliente**: Adicionar um novo cliente com os seguintes dados:
  - Nome
  - Telefone
  - Endereço
- **Visualizar Clientes**: Exibir todos os clientes cadastrados, com a possibilidade de realizar:
  - **Editar**: Atualizar informações do cliente (nome, telefone, endereço).
  - **Excluir**: Apagar um cliente da base de dados.

---

## **2. Fiados**

Na seção de **Fiados**, o usuário pode controlar as dívidas de clientes cadastrados:

### Funcionalidades:
- **Adicionar Fiado**: Registrar uma nova dívida para um cliente com os seguintes dados:
  - Data da dívida
  - Apelido (para identificar o tipo de fiado ou descrição)
  - Valor da dívida
  
- **Visualizar Dívidas**: Exibir todas as dívidas de um cliente, com a possibilidade de realizar:
  - **Apagar Dívida Única**: Excluir uma dívida específica.
  - **Apagar Toda Dívida**: Excluir todas as dívidas de um cliente (se necessário).

---

## **3. Produtos**

Na seção de **Produtos**, o usuário pode gerenciar o estoque da empresa:

### Funcionalidades:
- **Cadastrar Produto**: Adicionar um novo produto com as seguintes informações:
  - Nome do produto
  - Código do produto
  - Quantidade de unidades por caixa (qtd_caixa)
  - Preço por caixa (preco_caixa)
  
- **Visualizar Produtos**: Exibir todos os produtos cadastrados, com a possibilidade de realizar:
  - **Editar**: Atualizar informações do produto (nome, código, quantidade de caixas, preço da caixa e preço sugerido).
  - **Excluir**: Apagar um produto do banco de dados.

- **Cálculo de Preço Sugerido**: O sistema calcula automaticamente o preço sugerido para venda, baseado na quantidade de unidades por caixa e no preço da caixa. A fórmula utilizada é:
  
  ```
  Preço sugerido = (Preço da caixa / Quantidade de unidades por caixa) * 1.3
  ```

  Isso adiciona 30% ao valor de custo para gerar um preço sugerido de venda.

---

## Requisitos Técnicos

- **Tecnologias Utilizadas**:
  - **PHP**: Linguagem de programação para o backend.
  - **MySQL**: Banco de dados utilizado para armazenar as informações dos clientes, fiados e produtos.
  - **Bootstrap**: Framework CSS utilizado para o design responsivo e interação com o usuário.
  - **Ícones Bootstrap**: Para facilitar a navegação e visualização das ações no sistema.

- **Estrutura de Banco de Dados**:
  - **clientes**:
    - `id_clie` (INT, PRIMARY KEY)
    - `nome_clie` (VARCHAR)
    - `telefone_clie` (VARCHAR)
    - `endereco_clie` (VARCHAR)
  
  - **fiados**:
    - `id_fiado` (INT, PRIMARY KEY)
    - `id_clie` (INT, FOREIGN KEY)
    - `data_fiado` (DATE)
    - `apelido_fiado` (VARCHAR)
    - `valor_fiado` (DECIMAL)

  - **produtos**:
    - `id_prod` (INT, PRIMARY KEY)
    - `nome_prod` (VARCHAR)
    - `cod_prod` (VARCHAR)
    - `qtd_caixa` (INT)
    - `preco_caixa` (DECIMAL)
    - `preco_sujerido` (DECIMAL)

---

## **Instruções de Uso**

1. **Login**: Insira seu nome de usuário e senha para acessar o sistema.
2. **Clientes**:
   - Cadastrar um cliente preenchendo o formulário com nome, telefone e endereço.
   - Gerenciar clientes já cadastrados, podendo editar ou excluir informações.
3. **Fiados**:
   - Adicionar uma dívida para um cliente específico.
   - Visualizar as dívidas e apagar dívidas individuais ou todas as dívidas de um cliente.
4. **Produtos**:
   - Cadastrar novos produtos no sistema, informando nome, código, quantidade de caixas e preço por caixa.
   - O preço sugerido será automaticamente calculado com base no valor da caixa.

---

## **Segurança**

- **Autenticação**: O login é baseado em um único usuário, garantindo o controle de acesso.
- **Validação de Dados**: O sistema possui validação de dados tanto no lado do cliente quanto no lado do servidor para garantir a integridade dos dados e prevenir entradas inválidas.

---

## **Considerações Finais**

Este sistema oferece uma maneira simples e eficiente de gerenciar clientes, fiados e produtos, sendo ideal para pequenas empresas que buscam um controle melhor de suas operações diárias. O design responsivo permite o acesso via dispositivos móveis e desktop, tornando a gestão acessível em qualquer lugar.
