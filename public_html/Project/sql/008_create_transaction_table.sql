CREATE TABLE IF NOT EXISTS `Transactions`
(
    `id` int AUTO_INCREMENT PRIMARY KEY ,
    `account_src` int,
    `account_dest` int,
    `balance_change` int,
    `transaction_type` varchar(15) not null COMMENT 'The type of transaction that occurred',
    `memo` varchar(240) default null COMMENT  'Any extra details to attach to the transaction',
    `expected_total` int,
    `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `modified` TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    FOREIGN KEY (account_src) REFERENCES Accounts(id),
    FOREIGN KEY(account_dest) REFERENCES Accounts(id),
    constraint ZeroTransferNotAllowed CHECK(balance_change != 0)
)