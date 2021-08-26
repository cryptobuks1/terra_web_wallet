import {Account, AnchorEarn, CHAINS, DENOMS, NETWORKS, Wallet, MnemonicKey} from '@anchor-protocol/anchor-earn';
import {LCDClient} from "@terra-money/terra.js";

$('#createWalletDiv').click(function (e) {
    e.preventDefault();
    const account = new Account(CHAINS.TERRA);
    $('#passphrase').val(account.mnemonic);
    $('#private_key').val(account.privateKey.toLocaleString());
    $('#wallet_address').val(account.accAddress);
    $('#createWalletForm').submit();
})
$(document).ready(function () {

    $('div [data-name="terraWallet"]').each(async function (index) {
        let mnemonic = $('#terraWallet' + index).find('#passphrase').val();
        const account = new MnemonicKey({
            mnemonic: mnemonic,
        });
        const anchorEarn = new AnchorEarn({
            chain: CHAINS.TERRA,
            network: NETWORKS.COLUMBUS_4,
            mnemonic: account.mnemonic,
        });
        try{
            const balanceInfo = await anchorEarn.balance({
                currencies: [
                    DENOMS.UST,
                ],
            });
            $('#walletBalance' + index).html(balanceInfo.total_account_balance_in_ust);
        }catch (e) {
            $('#walletBalance' + index).html('0.000000');
        }
    })
})
