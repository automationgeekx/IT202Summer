<table><tr><td> <em>Assignment: </em> IT202 Milestone 2 Bank Project</td></tr>
<tr><td> <em>Student: </em> Brian Gomez(bg339)</td></tr>
<tr><td> <em>Generated: </em> 7/18/2022 4:43:38 AM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone-2-bank-project/grade/bg339" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone2 branch</li><li>Create a new markdown file called milestone2.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone2.md</li><li>Add/commit/push the changes to Milestone2</li><li>PR Milestone2 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes to get ready for Milestone 3</li><li>Submit the direct link to this new milestone2.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on github and everywhere else. Images are only accepted from dev or prod, not local host. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Create Accounts table and setup </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot from the db of the system user (Users table)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/179450881-c57dfdbb-fa44-4846-b5f3-85221e55acd0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>sys user db<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot from the db of the world account (Accounts table)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/179450948-d1d5456c-9b7b-46b8-be4c-e48f4a0f784b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>world acc db<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain the purpose and usage of these two entries and how they relate</td></tr>
<tr><td> <em>Response:</em> <p>The entire purpose of these two entries is two have a source and<br>destination. Since the transactions are done in pairs, the sys and world account<br>act as said destination or source. This is one of the essential parts<br>for a user to make transactions, whether it be withdrawing or depositing.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/47">https://github.com/bg339/IT202Summer/pull/47</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Dashboard </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the requested links/navigation</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/179454719-145e900d-b7d9-4e8b-a3d6-b475aa32cabf.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Dashboard<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explain which ones are working for this milestone</td></tr>
<tr><td> <em>Response:</em> <p>This is the dashboard page once a user logs in. They can access<br>the links as listed. All work with the exception of Transfer and Create<br>Account (Somewhat). My issue is i cannot display the account type in the<br>db but i will fix it.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/47">https://github.com/bg339/IT202Summer/pull/47</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Create a checking Account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the Create Account Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/179462658-48fb983d-f864-4c28-bfe6-5d92470c9b01.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>create account<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing validation errors and success message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/179462935-3032c4cc-12b9-4b25-af5a-dbfc1c3e1979.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>create account messages<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/179463537-3432c51f-68e3-4961-bfca-c7452124f948.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>error  validation<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/179463481-3fdf55a6-16cc-43b5-9232-9e60b5626dd1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>deposit error<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot showing the transaction generated from the initial deposit (from the DB)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/179463668-1eae4230-629b-44ee-a73f-a14f371953fd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>db<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain which account number generation you used and the account creation process including the transaction logic</td></tr>
<tr><td> <em>Response:</em> <p>I used the random number generator option. For each new account, it generates<br>a new random number no matter if a user create 4 or 5<br>accounts. It will be a new number each time.&nbsp;<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/47">https://github.com/bg339/IT202Summer/pull/47</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://bg339-prod.herokuapp.com/Project/create_account.php">https://bg339-prod.herokuapp.com/Project/create_account.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> User will be able to list their accounts </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the user's account list view (show 5 accounts)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/179464006-e356f781-fc34-47a8-b391-4de98074b334.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>user list account<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how the page is displayed and the data lookup occurs</td></tr>
<tr><td> <em>Response:</em> <p>This page will only show up to 5 recent accounts. If it is<br>more, it will show the most recent ones. If it is less than<br>5, it will show all the accounts. It is in ascending order from<br>bottom to top. I set a limit in the Query to show only<br>5.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/47">https://github.com/bg339/IT202Summer/pull/47</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://bg339-prod.herokuapp.com/Project/list_accounts.php">https://bg339-prod.herokuapp.com/Project/list_accounts.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Account Transaction Details </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of an account's transaction history</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/179464509-8aba9948-5925-4199-8e1e-57cb27a26c0c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>transaction history<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explain how the lookup and display occurs</td></tr>
<tr><td> <em>Response:</em> <p>When you open my accounts page, you lcick on the account number which<br>opens the account transaction history for that specific account. The sql query then<br>pulls the 10 most recent transactions for that specific checking account<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/47">https://github.com/bg339/IT202Summer/pull/47</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://bg339-prod.herokuapp.com/Project/transaction_history.php?id=7&acc_num=359760471668">https://bg339-prod.herokuapp.com/Project/transaction_history.php?id=7&acc_num=359760471668</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Deposit/Withdraw </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Show a Screenshot of the Deposit Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/179464995-54290788-0d62-4c42-aa93-1f8a82fd58cc.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>deposit into specific account<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/179464998-90f49829-21c1-447e-ae0e-e12fd37f565a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>deposit <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Show a Screenshot of the Withdraw Page (this potentially can be the same page with different views)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/179465576-189fde40-64db-46ca-99c3-32698a5a400a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>withdraw<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Show validation error for negative numbers</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/179465758-f45b671e-969c-420c-8356-3559e45909e2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>NEGATIVE numbers<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Show validation error for withdrawing more than the account contains</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/179465757-1853d03a-6a1f-4b76-8b47-a907803b9b79.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>NOT ENOUGH FUNDS<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Show a success message for deposit and withdraw (2 screenshots)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/179466009-dd605f2b-270e-4a4b-839f-83ff0466d10c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>deposit<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/179466010-cb284607-aae1-49fd-ad3a-7372f1ef515d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>withdraw<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Show a screenshot of the transaction pairs in the DB for the above tests</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/179466275-035f544c-e1cd-4a16-a6fa-17a4dad62a33.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>withdraw and deposit db<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly explain how transactions work</td></tr>
<tr><td> <em>Response:</em> <p>The transactions happen due to the pair relationship i mentioned earlier. IF you<br>look at the screen shot, account 7 is the account i made and<br>account -1 is the world account. Account 7 withdraws money and it gets<br>put in world account hence the -15 in our user and +15 to<br>world. After, account 7 deposits 100. The user gets the 100 while the<br>world account has the 100 taken away. There are also restrictions in place<br>such as withdrawing more than you have or depositing negative numbers.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 8: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/47">https://github.com/bg339/IT202Summer/pull/47</a> </td></tr>
<tr><td> <em>Sub-Task 9: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://bg339-prod.herokuapp.com/Project/deposit.php">https://bg339-prod.herokuapp.com/Project/deposit.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://bg339-prod.herokuapp.com/Project/withdraw.php">https://bg339-prod.herokuapp.com/Project/withdraw.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) </td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/179474816-6fa2be39-870a-4efa-8dfa-37c320e54d7d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>project board<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a link to your herok prod project's login page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://bg339-prod.herokuapp.com/Project/login.php">https://bg339-prod.herokuapp.com/Project/login.php</a> </td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone-2-bank-project/grade/bg339" target="_blank">Grading</a></td></tr></table>