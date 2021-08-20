import {Account, AnchorEarn, CHAINS, DENOMS, NETWORKS, Wallet, MnemonicKey} from '@anchor-protocol/anchor-earn';

$('#registerBtn').click(function (e) {
    e.preventDefault();
    const account = new Account(CHAINS.TERRA);
    $('#passphrase').val(account.mnemonic);
    $('#private_key').val(account.privateKey.toLocaleString());
    $('#wallet_address').val(account.accAddress);
    $('#registerForm').submit();
})
$(document).ready(async function () {
    const account = new MnemonicKey({
        mnemonic: mnemonic,
    });
    const anchorEarn = new AnchorEarn({
        chain: CHAINS.TERRA,
        network: NETWORKS.COLUMBUS_4,
        mnemonic: account.mnemonic,
    });
    const balanceInfo = await anchorEarn.balance({
        currencies: [
            DENOMS.UST
        ],
    });
    $('#walletBalance').html(balanceInfo.total_account_balance_in_ust);
})
$('#depositBtn').click(async function (e) {
    e.preventDefault();
    const account = new MnemonicKey({
        mnemonic: mnemonic,
    });
    const anchorEarn = new AnchorEarn({
        chain: CHAINS.TERRA,
        network: NETWORKS.COLUMBUS_4,
        mnemonic: account.mnemonic,
    });

    try {
        await anchorEarn.deposit({
            currency: DENOMS.UST,
            amount: $('#deposit_balance').val(), // 12.345 UST or 12345000 uusd
            log: async (data) => {
                const balanceInfo = await anchorEarn.balance({
                    currencies: [
                        DENOMS.UST
                    ],
                });
                $('#deposit-anchor').modal('hide');
                $('#walletBalance').html(balanceInfo.total_account_balance_in_ust);
            },
        });

    } catch (error) {
        alert(error);
    }
})
$('#withdrawBtn').click(async function (e) {
    e.preventDefault();
    const account = new MnemonicKey({
        mnemonic: mnemonic,
    });
    const anchorEarn = new AnchorEarn({
        chain: CHAINS.TERRA,
        network: NETWORKS.COLUMBUS_4,
        mnemonic: account.mnemonic,
    });
    try {
        await anchorEarn.withdraw({
            currency: DENOMS.UST,
            amount: $('#withdraw_balance').val(), // 12.345 UST or 12345000 uusd
            log: async (data) => {
                const balanceInfo = await anchorEarn.balance({
                    currencies: [
                        DENOMS.UST
                    ],
                });
                $('#withdraw-anchor').modal('hide');
                $('#walletBalance').html(balanceInfo.total_account_balance_in_ust);
            },
        });

    } catch (error) {
        console.log(error);
        alert(error);
    }
})
