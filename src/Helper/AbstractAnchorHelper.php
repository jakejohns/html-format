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

/**
 * AbstractHelper
 *
 * Description Here!
 *
 * @category CategoryName
 * @package  PackageName
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://www.gnu.org/licenses/agpl-3.0.txt AGPL V3
 * @link     http://jakejohns.net
 *
 */
abstract class AbstractAnchorHelper extends AbstractHelper
{

    /**
     * tag
     *
     * @var string
     * @access protected
     */
    protected $tag = 'a';

    /**
     * __invoke
     *
     * Summaries for methods should use 3rd person declarative rather
     * than 2nd person imperative, beginning with a verb phrase.
     *
     * @param mixed $href DESCRIPTION
     * @param mixed $txt  DESCRIPTION
     * @param mixed $attr DESCRIPTION
     *
     * @return mixed
     *
     * @access public
     */
    public function __invoke($href, $txt = null, $attr = [])
    {
        $attr = array_merge_recursive($attr, ['href' => $href]);
        $txt  = $txt ?: $this->shortenUrl($href);
        return parent::__invoke($txt, $attr, $this->tag);
    }

    /**
     * shortenUrl
     *
     * Summaries for methods should use 3rd person declarative rather
     * than 2nd person imperative, beginning with a verb phrase.
     *
     * @param mixed $url DESCRIPTION
     *
     * @return mixed
     *
     * @access protected
     */
    protected function shortenUrl($url)
    {
        $url = preg_replace('#^https?://#', '', $url);
        $url = preg_replace('/(?<=^.{22}).{4,}(?=.{20}$)/', '...', $url);
        return $url;
    }
}
