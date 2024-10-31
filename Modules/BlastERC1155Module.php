<?php declare(strict_types = 1);

/*  Idea (c) 2023 Nikita Zhavoronkov, nikzh@nikzh.com
 *  Copyright (c) 2023 3xpl developers, 3@3xpl.com, see CONTRIBUTORS.md
 *  Distributed under the MIT software license, see LICENSE.md  */

/*  This module processes ERC-1155 MT transfers in Blast. It requires a geth node to run.  */

final class BlastERC1155Module extends EVMERC1155Module implements Module, MultipleBalanceSpecial
{
    function initialize()
    {
        // CoreModule
        $this->blockchain = 'blast';
        $this->module = 'blast-erc-1155';
        $this->is_main = false;
        $this->first_block_date = '2024-02-24';
        $this->first_block_id = 0;

        $this->tests = [
            ['block' => 6127913, 'result' => 'a:2:{s:6:"events";a:12:{i:0;a:8:{s:11:"transaction";s:66:"0x35d80b5090b4af7835b0180582b2b7ec62441285f9b91b48ce63f0dec5508996";s:8:"currency";s:42:"0x3e99d1a52562454bf26d7c7112a303413a56bc08";s:7:"address";s:42:"0x0000000000000000000000000000000000000000";s:8:"sort_key";i:0;s:6:"effect";s:2:"-2";s:5:"extra";s:2:"13";s:5:"block";i:6127913;s:4:"time";s:19:"2024-07-15 17:47:21";}i:1;a:8:{s:11:"transaction";s:66:"0x35d80b5090b4af7835b0180582b2b7ec62441285f9b91b48ce63f0dec5508996";s:8:"currency";s:42:"0x3e99d1a52562454bf26d7c7112a303413a56bc08";s:7:"address";s:42:"0x6d802f4667ad169af7bdd203f79666e10409b050";s:8:"sort_key";i:1;s:6:"effect";s:1:"2";s:5:"extra";s:2:"13";s:5:"block";i:6127913;s:4:"time";s:19:"2024-07-15 17:47:21";}i:2;a:8:{s:11:"transaction";s:66:"0x35d80b5090b4af7835b0180582b2b7ec62441285f9b91b48ce63f0dec5508996";s:8:"currency";s:42:"0x3e99d1a52562454bf26d7c7112a303413a56bc08";s:7:"address";s:42:"0x0000000000000000000000000000000000000000";s:8:"sort_key";i:2;s:6:"effect";s:2:"-2";s:5:"extra";s:2:"19";s:5:"block";i:6127913;s:4:"time";s:19:"2024-07-15 17:47:21";}i:3;a:8:{s:11:"transaction";s:66:"0x35d80b5090b4af7835b0180582b2b7ec62441285f9b91b48ce63f0dec5508996";s:8:"currency";s:42:"0x3e99d1a52562454bf26d7c7112a303413a56bc08";s:7:"address";s:42:"0x6d802f4667ad169af7bdd203f79666e10409b050";s:8:"sort_key";i:3;s:6:"effect";s:1:"2";s:5:"extra";s:2:"19";s:5:"block";i:6127913;s:4:"time";s:19:"2024-07-15 17:47:21";}i:4;a:8:{s:11:"transaction";s:66:"0x35d80b5090b4af7835b0180582b2b7ec62441285f9b91b48ce63f0dec5508996";s:8:"currency";s:42:"0x3e99d1a52562454bf26d7c7112a303413a56bc08";s:7:"address";s:42:"0x0000000000000000000000000000000000000000";s:8:"sort_key";i:4;s:6:"effect";s:2:"-2";s:5:"extra";s:2:"20";s:5:"block";i:6127913;s:4:"time";s:19:"2024-07-15 17:47:21";}i:5;a:8:{s:11:"transaction";s:66:"0x35d80b5090b4af7835b0180582b2b7ec62441285f9b91b48ce63f0dec5508996";s:8:"currency";s:42:"0x3e99d1a52562454bf26d7c7112a303413a56bc08";s:7:"address";s:42:"0x6d802f4667ad169af7bdd203f79666e10409b050";s:8:"sort_key";i:5;s:6:"effect";s:1:"2";s:5:"extra";s:2:"20";s:5:"block";i:6127913;s:4:"time";s:19:"2024-07-15 17:47:21";}i:6;a:8:{s:11:"transaction";s:66:"0x35d80b5090b4af7835b0180582b2b7ec62441285f9b91b48ce63f0dec5508996";s:8:"currency";s:42:"0x3e99d1a52562454bf26d7c7112a303413a56bc08";s:7:"address";s:42:"0x0000000000000000000000000000000000000000";s:8:"sort_key";i:6;s:6:"effect";s:2:"-1";s:5:"extra";s:2:"16";s:5:"block";i:6127913;s:4:"time";s:19:"2024-07-15 17:47:21";}i:7;a:8:{s:11:"transaction";s:66:"0x35d80b5090b4af7835b0180582b2b7ec62441285f9b91b48ce63f0dec5508996";s:8:"currency";s:42:"0x3e99d1a52562454bf26d7c7112a303413a56bc08";s:7:"address";s:42:"0x6d802f4667ad169af7bdd203f79666e10409b050";s:8:"sort_key";i:7;s:6:"effect";s:1:"1";s:5:"extra";s:2:"16";s:5:"block";i:6127913;s:4:"time";s:19:"2024-07-15 17:47:21";}i:8;a:8:{s:11:"transaction";s:66:"0x35d80b5090b4af7835b0180582b2b7ec62441285f9b91b48ce63f0dec5508996";s:8:"currency";s:42:"0x3e99d1a52562454bf26d7c7112a303413a56bc08";s:7:"address";s:42:"0x0000000000000000000000000000000000000000";s:8:"sort_key";i:8;s:6:"effect";s:2:"-1";s:5:"extra";s:2:"22";s:5:"block";i:6127913;s:4:"time";s:19:"2024-07-15 17:47:21";}i:9;a:8:{s:11:"transaction";s:66:"0x35d80b5090b4af7835b0180582b2b7ec62441285f9b91b48ce63f0dec5508996";s:8:"currency";s:42:"0x3e99d1a52562454bf26d7c7112a303413a56bc08";s:7:"address";s:42:"0x6d802f4667ad169af7bdd203f79666e10409b050";s:8:"sort_key";i:9;s:6:"effect";s:1:"1";s:5:"extra";s:2:"22";s:5:"block";i:6127913;s:4:"time";s:19:"2024-07-15 17:47:21";}i:10;a:8:{s:11:"transaction";s:66:"0x35d80b5090b4af7835b0180582b2b7ec62441285f9b91b48ce63f0dec5508996";s:8:"currency";s:42:"0x3e99d1a52562454bf26d7c7112a303413a56bc08";s:7:"address";s:42:"0x0000000000000000000000000000000000000000";s:8:"sort_key";i:10;s:6:"effect";s:2:"-1";s:5:"extra";s:2:"18";s:5:"block";i:6127913;s:4:"time";s:19:"2024-07-15 17:47:21";}i:11;a:8:{s:11:"transaction";s:66:"0x35d80b5090b4af7835b0180582b2b7ec62441285f9b91b48ce63f0dec5508996";s:8:"currency";s:42:"0x3e99d1a52562454bf26d7c7112a303413a56bc08";s:7:"address";s:42:"0x6d802f4667ad169af7bdd203f79666e10409b050";s:8:"sort_key";i:11;s:6:"effect";s:1:"1";s:5:"extra";s:2:"18";s:5:"block";i:6127913;s:4:"time";s:19:"2024-07-15 17:47:21";}}s:10:"currencies";a:1:{i:0;a:3:{s:2:"id";s:42:"0x3e99d1a52562454bf26d7c7112a303413a56bc08";s:4:"name";s:0:"";s:6:"symbol";s:0:"";}}}'],
        ];
    }
}