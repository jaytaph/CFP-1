<?php
namespace cfp\UserBundle\Security\Core\User;

use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\FOSUBUserProvider as BaseClass;

class FOSUBUserProvider extends BaseClass
{

    /**
     * {@inheritDoc}
     */
    public function connect($user, UserResponseInterface $response)
    {
        $property = $this->getProperty($response);
        $username = $response->getUsername();

        //on connect - get the access token and the user ID
        $service = $response->getResourceOwner()->getName();

        $setter = 'set'.ucfirst($service);
        $setter_id = $setter.'Id';
        $setter_token = $setter.'AccessToken';

        //we "disconnect" previously connected users
        if (null !== $previousUser = $this->userManager->findUserBy(array($property => $username))) {
            $previousUser->$setter_id(null);
            $previousUser->$setter_token(null);
            $this->userManager->updateUser($previousUser);
        }

        //we connect current user
        $user->$setter_id($username);
        $user->$setter_token($response->getAccessToken());

        $this->userManager->updateUser($user);
    }

    /**
     * {@inheritdoc}
     */
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $service = $response->getResourceOwner()->getName();
        $setter = 'set'.ucfirst($service);
        $setter_id = $setter.'Id';
        $setter_token = $setter.'AccessToken';


        $githubId = $response->getUsername();
        $email = $response->getEmail();

        // See if the user is already present (through their github-id)
        $user = $this->userManager->findUserBy(array($this->getProperty($response) => $githubId));
        if (! $user) {
            // No user found. Check if we can find the user by the email-address of the github account
            $user = $this->userManager->findUserByEmail($email);

            if ($user) {
                // The only thing we should do, is set the github ID and access token. We know these are not set,
                // because we could find an email address, but not an id. This means that the user has registered through
                // the form, but on a later login, decided to use the github button. That's ok..
                $user->$setter_id($githubId);
                $user->$setter_token($response->getAccessToken());

                $this->userManager->updateUser($user);
            }
        }

        // Cannot find the user by either email or github ID. Register us as a new user.
        if (null === $user) {
            /** @var $user \Cfp\UserBundle\Entity\User */
            $user = $this->userManager->createUser();
            $user->$setter_id($githubId);
            $user->$setter_token($response->getAccessToken());

            // Email is (sortakinda) guaranteed to be unique. So we can just set it.
            $user->setEmail($response->getEmail());

            // Set info that does not have to be unique (like realname, dob, avatars etc)
            $user->setFullName($response->getRealName());

            // Check for unique username. And if it isn't unique, keep increasing with a number, until we hit a unique
            $username = $response->getNickname();
            $postfix = ""; $i = 0;
            while ($this->userManager->findUserByUsername($username.$postfix)) {
                $postfix = ++$i;
            }
            $user->setUsername($username . $postfix);

            /* This user does not have a password to login, but we need to set SOME kind of password.
             * Since this code is open, we cannot set this to a default password, or something that can be
             * guessed (like "name . email" or something). Therefor we just use a randomized string as
             * password, so both we and the actual user does not know it. The user however, can reset the
             * password if it likes to login through the normal form, instead of the github login.
             */
            $user->setPlainPassword(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36));
            $user->setEnabled(true);
            $this->userManager->updateUser($user);
            return $user;
        }

        // if user exists - go with the HWIOAuth way
        $user = parent::loadUserByOAuthUserResponse($response);

        $serviceName = $response->getResourceOwner()->getName();
        $setter = 'set' . ucfirst($serviceName) . 'AccessToken';

        //update access token
        $user->$setter($response->getAccessToken());

        return $user;
    }

}
