<?php

use Livro\Control\AbstractPage;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
/**
 * Description of TwigListControl
 * 
 * Essa clsse tem por objetivo fazer a substituição de marcações html usando o
 *  Twig, nesse caso temos uma matriz que vai ser repetida pelo twig:
 * 
 * % for pessoa in pessoas %}
            <tr> <td> {{pessoa.codigo}} </td> 
                 <td> {{pessoa.nome}} </td>
                 <td> {{pessoa.endereco}} </td>
            </tr>
        {% endfor %}
 * Essa estrutura é uma loop for do twig, pessoa será o incremento onde o twig irá
 *  procurar os campos para formar a coluna dos dados que serão exibidos(código, 
 *  nome e endereco) e pessoas será a matriz que iremos passar, uma matriz de 3 
 *  posições para substituir 3 colunas no html.
 * 
 * @author raul
 * @date 20/11/2022
 * 
 */
class TwigListControl extends AbstractPage {

    public function __construct() {
        parent::__construct();

        $loader = new FilesystemLoader('App/Resources');
        $twig = new Environment($loader);
        $template = $twig->load('list.html');

        $replaces = [];
        $replaces['titulo'] = 'Lista de pessoas';
        $replaces['pessoas'] = [
            
            ['codigo' => 1,
             'nome' => 'Anita Garibald',
             'endereco' => 'Rua tal'],
            
            ['codigo' => 2,
             'nome' => 'Henrique',
             'endereco' => 'Rua sem nome'],
            
            ['codigo' => 3,
             'nome' => 'Marcela',
             'endereco' => 'Rua qualquer']
            
        ];

        print $template->render($replaces);
    }

}
