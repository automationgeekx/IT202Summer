<table><tr><td> <em>Assignment: </em> IT202 Milestone 4 Bank Project</td></tr>
<tr><td> <em>Student: </em> Brian Gomez(bg339)</td></tr>
<tr><td> <em>Generated: </em> 8/7/2022 8:28:37 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone-4-bank-project/grade/bg339" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone4 branch</li><li>Create a new markdown file called milestone4.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone4.md</li><li>Add/commit/push the changes to Milestone4</li><li>PR Milestone4 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes</li><li>Submit the direct link to this new milestone4.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on GitHub and everywhere else. Images are only accepted from dev or prod, not localhost. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> User can set their profile to public or private </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of new column on the Users table</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183315237-784794a9-b37e-4d80-8035-cc288654b89e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>I used a boolean. 0 insinuates private whilst 1 is public<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of updated profile edit view</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183315355-959d08f1-f262-48fa-a5a8-05afccf27654.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Profile is set to private<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot of profile view view (ensure email isn't shown publicly)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183315335-cfbe20fe-6140-4163-8a0f-f84054c304de.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Email is shown as private for this account<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request(s) links</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/67">https://github.com/bg339/IT202Summer/pull/67</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add direct link to a public profile from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="http://bg339-prod.herokuapp.com/Project/profile.php">http://bg339-prod.herokuapp.com/Project/profile.php</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain the logic behind how public/private profile works</td></tr>
<tr><td> <em>Response:</em> <p>My logic behind public and private profile was to use a boolean within<br>the database. When the user selects private and updates their profile, the value<br>in the DB will be set to 0. If the user selects public<br>and updates, the value will be set to 1in the db meaning that<br>their information will be viewable. In my code, I used a php if<br>statement to check for those values. Depending on whether the value is 0<br>or 1, the user will be greeted with a different profile view.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> User will be able to open a savings account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the create account page for savings with the form filled in</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183315696-651c1bff-1fbe-4d71-b9b1-8684e8601c5b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Form with filled in information<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of the code that determines the APY</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183315730-97636333-9358-4c9c-8e6f-e74d5ed3d053.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This code has 2 functions. In the system properties tables, I have two<br>entries with names loan and savings. getLoan gets the APY value for loan<br>where as getSaving gets the APY for savings accounts<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshots of the related error and success messages when creating a savings account</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183315815-2544f22d-db1b-4b25-a66b-05a09d43b230.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Error messages<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183315817-ea7e22a8-b819-45b3-9c23-e3bdc2208712.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Success<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add screenshot(s) of the db showing the new savings account</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183315904-4bf2e099-4447-4182-9525-131e907bb13a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Redid. Realized I created checkings. Time stamp should match<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183315936-8a16a086-d5a7-4121-ab63-7472c9321c16.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Account<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183316119-5905c34e-2f50-40e6-bbb5-c66fec0c85e6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>sysprop table<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/67">https://github.com/bg339/IT202Summer/pull/67</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Add link to the related page on heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="http://bg339-prod.herokuapp.com/Project/create_account.php">http://bg339-prod.herokuapp.com/Project/create_account.php</a> </td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly explain the logic behind the APY value</td></tr>
<tr><td> <em>Response:</em> <p>The sys prop table holds 2 entries. One for loans and one for<br>savings. Each of those entries has a value for APY. My logic was<br>when they go to create an account, if they were to select savings,<br>then I call the function i created called usersavingsAPY which selects from sysprop<br>table where name = savings and then applies the interest rate to that<br>account. If the user however chooses chekcing, no APY is applied.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User will be able to take out a loan </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/f2c037/000000?text=Partial"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot showing the form for opening a loan along with the system generated APY</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183316004-e01deda1-3169-4a9b-bbab-4f8a6f80289f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Loan with prefilled apy<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot showing the user's accounts that can be deposited into</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183316003-91a23ed3-1f4b-4464-b435-4392b16eb72e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Listed accounts you can take a loan out for<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot from the db showing the loan account has a negative balance and the generated transaction</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183316260-2e52897c-ec05-41e0-a6bd-7d2b43be7946.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>account table<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183316119-5905c34e-2f50-40e6-bbb5-c66fec0c85e6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>sys prop table<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183316323-4a49c29b-4b6d-45e9-a303-f0adac65e203.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>transaction table<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot from the User's account list page showing the loan displaying as a positive value</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183316462-de33b445-307c-4773-aaed-fb14d4488992.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Loan<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a screenshot showing the code logic for updating the loan's balance per the requirements</td></tr>
<tr><td><table><tr><td>Missing Image</td></tr>
<tr><td> <em>Caption:</em> (missing)</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add screenshot showing user can't transfer more money from a loan account (alternatively don't show loan accounts in the dropdown for transfer transactions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183316631-da5b8b87-3c07-4380-954a-de57ac3a0674.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>cannot transfer insufficient funds<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 7: </em> Add screenshots of any other errors and success</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183316654-3c6f7c17-1c7e-4e33-bc3e-10aa3d1d196f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>cannot transfer to same account; cannot transfer from loan account to loan account<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 8: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/67">https://github.com/bg339/IT202Summer/pull/67</a> </td></tr>
<tr><td> <em>Sub-Task 9: </em> Add link to create/open loan page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="http://bg339-prod.herokuapp.com/Project/takeoutLoan.php">http://bg339-prod.herokuapp.com/Project/takeoutLoan.php</a> </td></tr>
<tr><td> <em>Sub-Task 10: </em> Briefly explain the special code implementations for loans</td></tr>
<tr><td> <em>Response:</em> <p>The loan in the database is presented as a negative value whilst on<br>the profile page it is presented as a positive value. Each time a<br>user makes a payment to the loan, it gets added in the database<br>until the loan reaches an amount of zero. Also each time a user<br>makes a payment, the loan balance should update.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Listing accounts should show applicable APY or - if none is set for a particular account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the account list showing a combination of checkings, savings, loans, etc</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183316824-d0ce13b4-e76c-42f5-82c4-0f2fc748ac17.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shows loans, checking, and savings account with appropriate apy<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/67">https://github.com/bg339/IT202Summer/pull/67</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to the Account list page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="http://bg339-prod.herokuapp.com/Project/list_accounts.php">http://bg339-prod.herokuapp.com/Project/list_accounts.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> User will be able to close an account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot showing validation that an account can't be closed if it has a balance (regular account and loan)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183316994-4e8abdf8-13b9-443e-b2dd-78c129aae1e1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Error when closing<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot from the DB showing a closed account as inactive</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183317061-5daf470c-2a15-4dac-9dc0-af6d7ab36370.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>account with id 6. isopenedorclosed is set to 0 meaning it is closed<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshots of the various account list queries (in the code) showing the changes to use is_active</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183317167-6da101c1-b98f-4780-b68c-e33d0629a6f3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>closes account based on account number from the specific account page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/67">https://github.com/bg339/IT202Summer/pull/67</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a link to the page where a user can close an account</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="http://bg339-prod.herokuapp.com/Project/closed.php">http://bg339-prod.herokuapp.com/Project/closed.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone4 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/183317417-de51781b-28f8-4342-a44a-3670edb5af62.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>project board<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone-4-bank-project/grade/bg339" target="_blank">Grading</a></td></tr></table>