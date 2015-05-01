<?php
/**
* Jnjxp\HtmlFormat
*
* PHP version 5
*
* This program is free software: you can redistribute it and/or modify it
* under the terms of the GNU Affero General Public License as published by
* the Free Software Foundation, either version 3 of the License, or (at your
* option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU Affero General Public License for more details.
*
* You should have received a copy of the GNU Affero General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
*
* @category  Helper
* @package   Jnjxp\HtmlFormat
* @author    Jake Johns <jake@jakejohns.net>
* @copyright 2015 Jake Johns
* @license   http://www.gnu.org/licenses/agpl-3.0.txt AGPL V3
* @link      http://jakejohns.net
 */

namespace Jnjxp\HtmlFormat\Helper;

use Aura\Html\Helper\AbstractHelper as BaseHelper;

/**
 * AbstractHelper
 *
 * @category Helper
 * @package  Jnjxp\HtmlFormat
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://www.gnu.org/licenses/agpl-3.0.txt AGPL V3
 * @link     http://jakejohns.net
 *
 * @see      BaseHelper
 * @abstract
 */
abstract class AbstractHelper extends BaseHelper
{
    /**
     * tag
     *
     * @var string
     * @access protected
     */
    protected $tag = 'div';

    /**
     * attr
     *
     * @var attr
     * @access protected
     */
    protected $attr = [];

    /**
     * __invoke
     *
     * Summaries for methods should use 3rd person declarative rather
     * than 2nd person imperative, beginning with a verb phrase.
     *
     * @param string $content DESCRIPTION
     * @param array  $attr    DESCRIPTION
     * @param string $tag     DESCRIPTION
     *
     * @return mixed
     *
     * @access public
     */
    public function __invoke($content, $attr = [], $tag = null)
    {
        $tag  = $tag ?: $this->tag;
        $attr = $this->escaper->attr(
            array_merge_recursive($this->attr, (array) $attr)
        );
        $html = $this->indent(0, "<{$tag} {$attr}>{$content}</{$tag}>");
        $this->setIndentLevel(0);
        return $html;
    }
}
