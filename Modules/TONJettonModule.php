<?php declare(strict_types = 1);

/*  Idea (c) 2023 Nikita Zhavoronkov, nikzh@nikzh.com
 *  Copyright (c) 2023-2024 3xpl developers, 3@3xpl.com, see CONTRIBUTORS.md
 *  Distributed under the MIT software license, see LICENSE.md  */

/*  This module works with the TEP-74 standard, see
 *  https://github.com/ton-blockchain/TEPs/blob/master/text/0074-jettons-standard.md */  

final class TONJettonModule extends TONLikeJettonModule implements Module, MultipleBalanceSpecial
{
    function initialize()
    {
        // CoreModule
        $this->blockchain = 'ton';
        $this->module = 'ton-jetton';
        $this->is_main = false;
        $this->first_block_date = '2019-11-15';
        $this->first_block_id = 0;

        // TONLikeMainModule
        $this->workchain = '0'; // BaseChain
    }
}
