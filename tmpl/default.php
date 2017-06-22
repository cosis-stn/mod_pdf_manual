<?php
/**
 * @author     Clayton Alves Rodrigues <clayton.rodrigues@tesouro.gov.br>
 * @copyright  © 2016 STN/COSIS. Todos os direitos reservados.
 * @license    GNU General Public License versão 2 ou posterior; consulte o arquivo License. txt
 */
defined('_JEXEC') or die('Restricted access');
$session =& JFactory::getSession();

// pegar o alias pela url
// recurso utilizado para recuperar o nome do artigo dinamicamente e evitar que seja inserido um módulo para cada manual.
// para utilizar o módulo em outros portais o ideal seria que fosse implementado um parametro com as categorias ou o alias da categoria.
$inicio = strlen(JUri::base());
$fim = strlen(JUri::current());
$base = substr(JUri::current(), $inicio, $fim);
$arBase = explode('/', $base);

$session->set( 'pagina-inicial', $arBase[0] );
$url = JURI::base().'modules/mod_pdf_manual/pdf/'.$session->get('pagina-inicial').'.pdf';
$arquivoExiste = file_exists(getcwd().DIRECTORY_SEPARATOR.'modules'.DIRECTORY_SEPARATOR.'mod_pdf_manual'.DIRECTORY_SEPARATOR.'pdf'.DIRECTORY_SEPARATOR.$session->get('pagina-inicial').'.pdf');
?>

<?php if($arquivoExiste): ?>
    <ul class="span3">
        <li><span class="icon-download-alt"></span><a href="<?php echo $url; ?>" target="_blank"> Versão para impressão </a></li>
    </ul>    
<?php endif; ?>

