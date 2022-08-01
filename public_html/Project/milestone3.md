<table><tr><td> <em>Assignment: </em> IT202 Milestone 3 Bank Project</td></tr>
<tr><td> <em>Student: </em> Brian Gomez(bg339)</td></tr>
<tr><td> <em>Generated: </em> 8/1/2022 12:19:49 AM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone-3-bank-project/grade/bg339" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone3 branch</li><li>Create a new markdown file called milestone3.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone3.md</li><li>Add/commit/push the changes to Milestone3</li><li>PR Milestone3 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes to get ready for Milestone 4</li><li>Submit the direct link to this new milestone3.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on GitHub and everywhere else. Images are only accepted from dev or prod, not localhost. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> User will be able to transfer between their accounts </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of transfer page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182065070-569b509b-01f6-40c3-8108-6f565954a5eb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>greet screen<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182065211-3551b000-d9a1-49db-9c80-9235db1f1a49.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Internal Transfer page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot showing dropdown values</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182065336-4334fd39-2bc7-4660-82a2-6b1c76b68f45.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Internal transfer dropdown<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot showing user can't transfer more funds than they have</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182065931-471b43f2-ba4f-455f-ae14-4c3595fedccb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Insufficient funds<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add screenshot showing user can't transfer to the same account</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182065931-471b43f2-ba4f-455f-ae14-4c3595fedccb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Same account<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182068679-b69333fe-3c83-4483-aae0-d07507d5514e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>error handle<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add screenshot showing you can't transfer an negative balance</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182066029-8bbaf3c4-8626-427d-ba30-ef232e123504.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>neg balance<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182068679-b69333fe-3c83-4483-aae0-d07507d5514e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>error handle<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add screenshot of the generated transaction history from the db</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182066388-392a190a-7cd4-4007-b74f-b09c12b3f274.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>look at the bottom most recent transactions. this was an internal transfer between<br>2 accounts<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 7: </em> Add a screenshot of the Accounts table showing both affected accounts</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182066705-a2e85b08-1ac9-4e0f-8b6d-9517377c741a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Affected accounts<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 8: </em> Briefly explain the code process/flow of a transfer including how the accounts are fetched for the dropdowns</td></tr>
<tr><td> <em>Response:</em> <p>Internal Transfer uses function get_user_id() to store the current users id in a<br>variable. That variable is then passed into a sql query to retrieve account<br>number, id and balance that matches the user id. I fetch the results<br>and store it in an array. I wrote a for each to iterate<br>through each account and output it in option tags. There is a source<br>field, dest field, and transfer amount as well as memo field. I use<br>an if statement to check if the fields are set. If they are<br>set, i store those into variables. I use my get balance function to<br>retrieve the balance for error checking such as insufficient funds. At the bottom,<br>i use my transfer function to make the final transfer.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 9: </em> Add pull request(s) url</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/65">https://github.com/bg339/IT202Summer/pull/65</a> </td></tr>
<tr><td> <em>Sub-Task 10: </em> Add link to transfer page from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://bg339-prod.herokuapp.com/Project/transfer.php">https://bg339-prod.herokuapp.com/Project/transfer.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://bg339-prod.herokuapp.com/Project/transfer_dropdown.php">https://bg339-prod.herokuapp.com/Project/transfer_dropdown.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Transaction History Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/f2c037/000000?text=Partial"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of transaction history page showing the new transfer transaction</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182067787-6996e3f8-6e4a-4ae0-a223-8071e27b6492.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Ss of external transactions<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots demonstrating the filters and pagination</td></tr>
<tr><td><table><tr><td>Missing Image</td></tr>
<tr><td> <em>Caption:</em> (missing)</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how the filters/pagination work</td></tr>
<tr><td> <em>Response:</em> <p>Incomplete. Will be done for m4.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add pull request(s) url</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/65">https://github.com/bg339/IT202Summer/pull/65</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add link to Transaction History page from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://bg339-prod.herokuapp.com/Project/transaction_history.php?id=6&acc_num=582132186704">https://bg339-prod.herokuapp.com/Project/transaction_history.php?id=6&acc_num=582132186704</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User's profile First name and Last name </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the user's profile with the new fields</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182067978-57ac5b62-c011-409c-b77f-30c21eeb19a0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Once name is updated, it remains in profile page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182068042-20740ad1-7729-41bd-bf0f-1af1a6d59dc3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>home page also shows name<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add pull request(s) url</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/65">https://github.com/bg339/IT202Summer/pull/65</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add link to profile page from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://bg339-prod.herokuapp.com/Project/home.php">https://bg339-prod.herokuapp.com/Project/home.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://bg339-prod.herokuapp.com/Project/transaction_history.php?id=2&acc_num=831852535177">https://bg339-prod.herokuapp.com/Project/transaction_history.php?id=2&acc_num=831852535177</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> User will be able to transfer funds to another user </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the external transfer page with filled in data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182065070-569b509b-01f6-40c3-8108-6f565954a5eb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>search user<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182068341-6c9f7fd5-fb2f-44bd-9409-17ed21d94e46.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>found user<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182068389-f0f97a2d-e396-42a1-be07-f40862bd0836.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>External transfer. Information comes prefilled once you click on account you want to<br>transfer to<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot showing user can't send more than they have</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182068499-a19dc2a2-eaab-48f6-9e96-16230019d423.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>message<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182068679-b69333fe-3c83-4483-aae0-d07507d5514e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>error handle<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot showing they can't send a negative amount</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182068679-b69333fe-3c83-4483-aae0-d07507d5514e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>error handle<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182068865-a6ca6ca9-918b-49a4-b58b-3ab4c235a052.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>neg amount<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add screenshot(s) showing message if a user doesn't exist and/or a destination account wasn't found</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182068958-da240052-6db7-4cf5-b55e-5b425ee6cb28.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>before<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182069443-c536c19e-29fe-4f35-b5c2-7c59993acb06.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>after<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add screenshot of the transactions table showing the recorded transfer</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182069595-a8fbdc5b-5c47-4191-a508-a561a70f1114.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>transaction between 2 external accounts<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add screenshot(s) showing the updated account balances</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182070632-96a5cc82-d3e5-4424-8aba-d90f20fce3a3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>updated balance<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly explain the process of looking up the target user's account and the validation logic</td></tr>
<tr><td> <em>Response:</em> <p>I followed along with the document. I have a function that takes the<br>input from the last name field and last 4 digits of accounts and<br>it queries the db for the account number with the exact id and<br>an account number the ends in those last 4 digits using a LIKE<br>clause. Once they find the account, they click on it to go to<br>the next page which is the external transfer page. It can only do<br>ext transfers. From the account that the user selects as a recipient, the<br>information will be prefilled already. I copied the same logic from my internal<br>transfer php but instead of setting the acc dest to the same as<br>the user, i set it to the account num of the recipient by<br>using a nested function get_accnum(get_lname_id()) in where lname_id returns an id based off<br>of a last name argument and then get accnum returns the account number<br>associated with that last name.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 8: </em> Add pull request(s) url</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/65">https://github.com/bg339/IT202Summer/pull/65</a> </td></tr>
<tr><td> <em>Sub-Task 9: </em> Add link to external transfer page from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://bg339-prod.herokuapp.com/Project/external_transfer.php?account_id=&account_number=831852535177&account_name=Toegel">https://bg339-prod.herokuapp.com/Project/external_transfer.php?account_id=&account_number=831852535177&account_name=Toegel</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone3 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/182071451-94dfd62d-75a7-4dcc-bbaf-dc362b091248.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>proj board<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone-3-bank-project/grade/bg339" target="_blank">Grading</a></td></tr></table>