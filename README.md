This project is a simple way of creating and maintaining papers for conferences for both speakers and conference
organizers. It will allow conference organisers to open a call-for-papers. Speakers will directly see which conferences
are open, and where to submit to. When the CFP is open, speakers can easily automatically add their profile and talks
to the conference.

When the CFP is closed, the conference-hosts (can be multiple users), can vote / discuss the papers, and select the
papers that will be added to the conference. It will be able to automatically send acceptance/rejections emails if
needed.

It tries to complement the joind.in project which can be found at https://github.com/joindin/joind.in.

There is still a long todo list, see the issue-list for more information



Installation
============
 * php composer.phar install
 * php app/console doctrine:schema:create
 * php app/console doctrine:generate:entities Cfp
 * php app/console doctrine:fixtures:load


