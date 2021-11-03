[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![https://github.com/isla-just/Scribble/issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![https://www.linkedin.com/in/isla-just-b038a2202/][linkedin-shield]][linkedin-url]
<!--fix these links-->



<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/isla-just/Scribble">
    <img src="https://github.com/isla-just/Scribble/blob/main/readMeimg/logo.png" alt="Logo" width="" height="80">
  </a>

  <p align="center">
  A creative learning portal allowing students and teachers to access their online class details
    <br />
    <a href="https://github.com/isla-just/Scribble"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/isla-just/Scribble">View Demo</a>
    <!--insert demo video-->
    ·
    <a href="https://github.com/isla-just/Scribble/issues">Report Bug</a>
    ·
    <a href="https://github.com/isla-just/Scribble/issues">Request Feature</a>
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
    <li><a href="#functions">Features and functions</a></li>
    <li><a href="#concept">Concept process</a>
          <ul>
        <li><a href="#ideation">Ideation</a></li>
        <li><a href="#wireframes">Wireframes</a></li>
        <li><a href="#userflow">User-flow diagram</a></li>
      </ul>
    </li>
     <li><a href="#dev">Development process - implementation</a></li>
      <li><a href="#demo">Demo video</a></li>
    <li><a href="#Contributions">Contributions</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgements">Acknowledgements</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
<br></br>

# About The Project

  <img src="https://github.com/isla-just/Scribble/blob/main/readMeimg/mockup1.jpg" alt="mockup" width="800" height="" align="center">

<br></br>

## Built With

* [https://expressjs.com/](express.js)
* [https://reactjs.org/](react.js)
* [https://www.javascript.com/](javascript)

<br></br>
<!-- GETTING STARTED -->
# Getting Started

To run a local copy of Scribble follow these simple steps:

## Prerequisites

* install Node.js [https://nodejs.org/en/](node.js) and follow the installation instructions

* homebrew
  ```sh
  brew install node
  brew install npm 
  ```

* npm
  ```sh
  npm install
  npm init --yes
  ```

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/isla-just/Scribble.git
   ```
2. Install NPM packages - client.js
   ```sh
   npm install
   npm install react-calendar
   npm install react-router-dom
   ```

3. Install NPM packages - server.js
   ```sh
    npm install
    npm install express --save
    npm install cors
   ```

<br></br>

# Features and functions 
This is a student portal website that allows both teachers and students to view their class details for all online classes. The user can login to their account wherein the login information is pulled directly from the api and then they are taken to their corresponding home page. The user can view all of ther classes, a styled calendar showing them where they are and their personal details. The user can click on a class to access more details including the teacher message and the list of students. Teachers can even edit the class and send their students a message for the class. 

See the [open issues](https://github.com/isla-just/Scribble/issues) for a list of proposed features (and known issues).

<br></br>

# Concept process
### Ideation
For this project I started off with coming up with my brand. I desgned a logo and put together a colour palette. I also started looking at some inspiration images and thinking about the flow of my website. 


  <img src="https://github.com/isla-just/Scribble/blob/main/readMeimg/concept1.jpg" alt="concept" width="800" height="" align="center">
<br></br>

### Wireframes

It was then time to start designing and planning the layout of my website. Here are some sketched wireframes that I drew:
  <img src="https://github.com/isla-just/Scribble/blob/main/readMeimg/wireframe.jpg" alt="wireframe" width="800" height="" align="center">

<br></br>

### User-flow diagram
Next, I did a simple userflow diagram that maps out the basic flow of information as the user interacts with the website. This is the one I did for the teacher profile (the flows are very similar except students cant edit classes)
  <img src="https://github.com/isla-just/Scribble/blob/main/readMeimg/userFlow.jpg" alt="user flow" width="800" height="" align="center">
<br></br>

# Development process and implementation
Roadmap of my progress and struggles over the last 9 weeks
1. I started implementing my design in my React frontend first and made sure I was happy with the frontend design.
2. then I started working on my backend making sure that all of the api information displayed on the backend. I also started coding some more complex api endpoints to return more specific data and also linking data between the diferent datasets in mt data file that I was given
3. Then it was time to work on linking the frontend and the backend and actually displaying the api content. This was relatively easy however I really struggles with React rendering dom elements from the api before the api call was done so I had to do some workaround code to fix that error
4. Next it was time to actually implement the key website functionality from the backend onto the frontend. The login form was surprisingly the more challenging part of this. Implementing the crud functionality was fairly simple
5. Next I just did some frontend refinements and made sure that everything was working nicely. Here I added some jquery and some nice popups for when the teacher edits the information. 

<!-- USAGE EXAMPLES -->
## Usage

This project could be built upon by adding loads of different features. Perhaps a sign up form would be useful and I also would have liked to implement the search for a user functionality. This project could also be used as a resource for building a React website with an express backend. React worked super well in terms of displaying and updating the content dynamically because it is an SPA
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

Project Link: [https://github.com/isla-just/Scribble](https://github.com/isla-just/Scribble)



<!-- ACKNOWLEDGEMENTS -->
## Acknowledgements and references

* [https://smartmockups.com/mockups/laptop]()
* [https://smartmockups.com/mockups/desktop]()
* [https://www.freepik.com/free-vector/smiling-people-avatar-set-different-men-women-characters-collection_13663484.htm#position=4]()
* [https://www.freepik.com/free-vector/flat-linearonline-
learning-landingpage_
13720079.htm#position=0]()
* [https://github.com/ArmandPret/rona]()
* [https://stackoverflow.com/questions/42914666/react-router-external-link]()
* [https://stackoverflow.com/questions/51003189/reactjs-how-to-style-react-calendar]()
* [https://www.npmjs.com/package/simple-react-calendar]()
* lecturers Christof Enslin and Armand Pretorius




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

