[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![https://github.com/isla-just/CoCreate_ProjectRestart/issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![https://www.linkedin.com/in/isla-just-b038a2202/][linkedin-shield]][linkedin-url]
<!--fix these links-->



<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/isla-just/CoCreate_ProjectRestart">
    <img src="https://github.com/isla-just/CoCreate_ProjectRestart/blob/master/readMeimg/logo2.png" alt="Logo" width="" height="80">
  </a>

  <p align="center">
  A community allowing creatives to ask questions and get constructive feedback on their design work
    <br />
    <a href="https://github.com/isla-just/CoCreate_ProjectRestart"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/isla-just/CoCreate_ProjectRestart">View Demo</a>
    <!--insert demo video-->
    ·
    <a href="https://github.com/isla-just/CoCreate_ProjectRestart/issues">Report Bug</a>
    ·
    <a href="https://github.com/isla-just/CoCreate_ProjectRestart/issues">Request Feature</a>
  </p>
</p>


<br></br>
<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary><h1 style="display: inline-block">Table of Contents</h1></summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#functions">ERD</a></li>
    <li><a href="#concept">Concept process</a>
          <ul>
        <li><a href="#ideation">Ideation</a></li>
        <li><a href="#wireframes">Wireframes</a></li>
        <li><a href="#userflow">User-flow diagram</a></li>
      </ul>
    </li>
     <li><a href="#dev">Development process - implementation</a></li>
     <li><a href="#dev">Promo Video</a></li>
          <li><a href="#dev">Project Conclusion</a></li>
    <li><a href="#Contributions">Contributions</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgements">Acknowledgements</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
<br></br>

# About The Project

  <img src="https://github.com/isla-just/CoCreate_ProjectRestart/blob/master/readMeimg/IslaJust_200080_DV204_mockup1.png" alt="mockup" width="800" height="" align="center">

<br></br>

## Technologies

* [https://symfony.com/5](Symfony.js)
* [https://www.postgresql.org/](postgreSQL)
* [https://www.heroku.com/platform](Heroku)
* [https://git-scm.com/](Git)
* [https://getbootstrap.com/](Bootstrap)


<br></br>
<!-- GETTING STARTED -->
# Getting Started

To run a local copy of CoCreate follow these simple steps:

## Prerequisites

* install Composer [https://getcomposer.org/download/](composer) and follow the installation instructions

* install php or check you are running on the latest version of php
  ```sh
  php -v
  ```

* composer require
  ```sh
  composer require
  ```

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/isla-just/CoCreate_ProjectRestart.git
   ```
2. composer require
  ```sh
  composer require annotations
  composer require debug
  composer require twig
  composer require symfony/orm-pack
  composer require --dev symfony/maker-bundle
  ```

<br></br>

# Features and functions 
Simply, this website allows users to login or signup, ask questions, view questions and respond to questions giving their feedback. This has all been done using CRUD functionality and ajax calls to dynamically update the frontend. The user can also view all of their past posts and view and edit their account settings. 

The admin user has different permissions. The admin user can delete posts, delete comments and can ban and unban users. This was done through simple CRUD functionality and tweaks on the frontend to create a seamless user experience

See the [open issues](https://github.com/isla-just/CoCreate_ProjectRestart/issues) for a list of proposed features (and known issues).

<br></br>

# Concept process

### Entity Relationship diagram
Next, I mapped out how my data would be structured. This ARD highlights the 3 tables I wanted to have along with their different relationships and keys

  <img src="https://github.com/isla-just/CoCreate_ProjectRestart/blob/master/readMeimg/ERD.png" alt="concept" width="800" height="" align="center">

### Ideation
For this project I started off with coming up with my brand. I desgned a logo and put together a colour palette. I also started looking at some inspiration images and thinking about the flow of my website. 


  <img src="https://github.com/isla-just/CoCreate_ProjectRestart/blob/master/readMeimg/concept.png" alt="concept" width="800" height="" align="center">
<br></br>

### Wireframes

It was then time to start designing and planning the layout of my website. Here are some sketched wireframes that I drew:
  <img src="https://github.com/isla-just/CoCreate_ProjectRestart/blob/master/readMeimg/wireframe.png" alt="wireframe" width="800" height="" align="center">

<br></br>

### User-flow diagram
Next, I did a simple userflow diagram that maps out the basic flow of information as the user interacts with the website. This is the one I did for a regular user (the flows are very similar except admin can edit questions and answers and manage users)
  <img src="https://github.com/isla-just/CoCreate_ProjectRestart/blob/master/readMeimg/wireflow.png" alt="wireframe" width="800" height="" align="center">
<br></br>

# Development process and implementation
Roadmap of my progress and struggles over the last 9 weeks
1. We started off the term by learning about the MVC and from there we could implement our Symfony projects locally. We also learned about routing and twig templates so we could start implementing our frontend
2. Next, we started to add functionality to our projects. We started off with our login and register crud functionality. We also had our databases completely set up at this point.
3. Next, we learned how to use ajax and how to do PHP unit testings in our class project. We also had progress marks weekly, providing us with the opportunity to get feedback and iterate.
4. Lastly, we looked at actually deploying our projects on Heroku. We also looked at converting our MySQL to PostgreSQL. I did loads of refinements and troubleshooting at this stage

## Additions
1. Exploration - On the explore page, I have included a filter that allows you to browse through the different communities and I have also included a load more button so that the user isn't bombarded with images
2. User friendly - I tried to account for the user experience in every aspect of this project by trying to create a seamless flow of events. I tried to make the website easy to navigate and added popups as feedback
3. Security - In terms of security, I set the session and checked it on every page to ensure that the user had logged in and everything is secure. I also hashed all of the passwords in my database for an added layer of security. I also included logout functionality
4. Responses - Instead of marking an answer as correct, I implemented a pin functionality that can only be done by the creator of the post. I have also sorted the responses so that the pinned one is at the top. Users can also upvote and downvote comments.

  <img src="https://github.com/isla-just/CoCreate_ProjectRestart/blob/master/readMeimg/mockup2.png" alt="mockup2" width="800" height="" align="center">

<!-- USAGE EXAMPLES -->
## Usage

This project could be built upon by adding loads of different features. In the future, I would like to add more screen dimensions to make my website fully compatible with most devices and I would like to add more popups and feedback throughout the user experience. Another great feature to add would be some kind of notification functionality where the user is notified if their question has been answered.

  <br></br>
_For more examples, please refer to the [Documentation](https://example.com)_


<br></br>

<!-- CONTRIBUTING -->
## Contributions

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

replace 'amazing feature' with anything cool you want to add!

<br></br>
<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.


<br></br>
<!-- CONTACT -->
## Contact

Isla Just - isla@just.co.za

Instagram - https://www.instagram.com/byislajust/

Linkedin - https://www.linkedin.com/in/isla-just-b038a2202/

<br></br>

Project Link: [https://github.com/isla-just/CoCreate_ProjectRestart](https://github.com/isla-just/CoCreate_ProjectRestart)



<!-- ACKNOWLEDGEMENTS -->
## Acknowledgements and references

mockups:
* https://originalmockups.com/mockups/free-mockups
* https://freedesignresources.net/category/free-mockups/?_paged=6
* https://www.anthonyboyd.graphics/mockups/28/

Illustrations:
* https://bulmaillustrates.com/

* Peers: Pieter Venter https://github.com/Pieter-stack and Hansin Prema
* lecturer: Armand Pretorius https://github.com/ArmandPret



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/isla-just/repo.svg?style=for-the-badge
[contributors-url]: https://github.com/isla-just/repo/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/isla-just/repo.svg?style=for-the-badge
[forks-url]: https://github.com/isla-just/repo/network/members
[stars-shield]: https://img.shields.io/github/stars/isla-just/repo.svg?style=for-the-badge
[stars-url]: https://github.com/isla-just/repo/stargazers
[issues-shield]: https://img.shields.io/github/issues/isla-just/repo.svg?style=for-the-badge
[issues-url]: https://github.com/isla-just/repo/issues
[license-shield]: https://img.shields.io/github/license/isla-just/repo.svg?style=for-the-badge
[license-url]: https://github.com/isla-just/repo/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/isla-just

