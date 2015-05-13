<?php

/**
 *  # Este arquivo é uma reprodução de um projeto do Wesley da School of net que teve a
    # finalidade de ensinar os principais fundamentos de um framework.
    #
    # Se não está familizarizado com MVC recomendo leitura sobre este assunto antes de iniciar
    # este estudo.
    #
    # Referência:
    # http://www.devmedia.com.br/conceito-de-mvc-e-sua-funcionalidade-usando-o-php/22324
    #
    # Ao estudar frameworks como Zend 2 ou Laravel poderá perceber que seguem o mesmo
    # princípio contido neste projeto modelo. Obviamente, cada um com seus atributos de
    # originalidade. Ao estudar este facilitará o processo de aprendizagem destes que mencionei.
    #
    # Os comentários são de minha autoria, para melhor explicação do processo.
    #
    # A identação, nomeclaturas, aberturas e fechamento de chaves seguem as normas PSRs
    # de http://www.php-fig.org.
    #
    # Ao estudar este projeto perceberá que há muitas divisões de processos, algo que
    # talvez pudesse ser feito apenas com uma classe ou um método por exemplo de uma maneira que
    # fosse interpretado melhor.
    #
    # Para entender essas divisões de processo recomendo antes de iniciar este estudo ler sobre
    # SOLID.
    #
    # SOLID são iniciais de 5 principíos da engenharia de software altamente recomendado.
    #
    # Single Responsibility Principle: princípio da responsabilidade única;
    # Open Closed Principle: princípio do aberto/fechado;
    # Liskov Substitution Principle: princípio da substituição de Liskov;
    # Interface Segregation Principle: princípio da segregação de Interfaces;
    # Dependency Inversion Principle: princípio da inversão de dependência.
    #
    # Na internet tem vasto material sobre isto mas deixo abaixo um site de referência.
    # Mas não se apeguem a ele, vejam outras materiais pois talvez a abordagem seja melhor
    # compreendida com outro autor.
    #
    # Referência:
    #
    # http://blog.caelum.com.br/principios-do-codigo-solido-na-orientacao-a-objetos/
    # 
    #######################################################################################  **/

/**
 * Inclui arquivo responsável pelo carregamento automático das bibliotecas do projeto
 * Somente aqui que será necessário incluí-lo
 */
require_once '../vendor/SplClassLoader.php';

/**
 * O código a seguir após este comentario é
 * 
 * $classLoader = new SplClassLoader('SON','../vendor');
 * 
 * Como parâmetros do construtor de SplClassLoader, SON é o diretório principal
 * dentro do diretório vendor
 * 
 * vendor é um diretório onde as biblitecas de terceiros, como zend framework,
 * doctrine ou as suas próprias bibliotecas ficam.
 * 
 * Não altere este nome, pois é um padrao da comunidade PHP e o composer, que é o
 * gerenciador de dependências, utiliza este nome para baixar ou atualizar novas
 * bibliotecas
 * 
 * O código $classLoader->register(); registra o diretório para ser usado na aplicação
 */
$classLoader = new SplClassLoader('SON','../vendor');
$classLoader->register();

/**
 * Idem ao anterior
 * Como parâmetros do construtor de SplClassLoader, o nome App é o diretório principal
 * dentro do diretório ../ (como estamos no diretório public, temos que voltar um nível)
 */
$classLoader = new SplClassLoader('App','../');
$classLoader->register();

/**
 *  O código a seguir
 *  
 *  new \App\Init;
 *  
 *  instancia a classe Init, responsável pelo bootstrap, ou seja, o processo que
 *  carrega as configurações do projeto e as executa.
 *  
 *  Não é preciso atribuir a intância a uma variável, algo como $var = new \App\Init;
 *  
 *  \APP\Init corresponde ao arquivo que fica em /App/Init.php no diretório raiz deste
 *  projeto
 *  
 *  O nome \APP\ antes da classe indica seu namespace
 *  
 *  Se não sabe o que é um namespace leia:
 *  
 *  http://php.net/manual/pt_BR/language.namespaces.php
 *  
 *  antes de continuar os estudos.
 *  
 *  Acesse agora /App/Init.php para mais orientações. O construtor desta classe é que
 *  faz o trabalho todo
 */
$bootstrap = new \App\Init;

