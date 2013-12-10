<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace BsrCleverReach;

/**
 * @author Michael Nientiedt
 * @licence MIT
 */
class CleverReachClient
{
    /**
     * Cleverreach API version
     */
    const API_VERSION = '5.0';

    /**
     * Cleverreach Wsdl url
     */
    const WSDL_URL = "http://api.cleverreach.com/soap/interface_v5.1.php?wsdl";

    private $apiKey;

    private $soapClient;

    /**
     * @param string $apiKey
     * @param string $wsdlUrl
     */
    public function __construct($apiKey, $wsdlUrl = self::WSDL_URL)
    {
        $this->apiKey = $apiKey;
        $this->soapClient = new \SoapClient($wsdlUrl);

    }

    public function __call($method, $args = array())
    {
        $args = array_merge(array($this->apiKey), $args);
        $this->soapClient->$method($args);
    }
}