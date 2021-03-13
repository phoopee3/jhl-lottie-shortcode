# Lottie shortcode for WordPress

## Use Case

Embed the lottie web player via a shortcode.

## Disclaimers/Warnings

## Installation

Download the zip and install it via the WordPress admin, or unzip/clone to the plugins folder, in a folder named `jhl-lottie-shortcode`

## Setup Instructions

Go to the plugins page and activate `Lottie Shortcode`.

On a page or post where you want the lottie player to appear, enter the shortcode.

The minimum shortcode content is:

`[lottie src="url to your lottie json file"]`

Other parameters include:

| Parameter  | Attribute  | Description                                      | Default     |
| ---------- | ---------- | ------------------------------------------------ | ----------- |
| playmode   | mode       | Either normal or bounce                          | normal      |
| direction  | direction  | Play forwards (1) or backwards (-1)              | 1           |
| background | background | Background color<br />transparent or hex code    | transparent |
| width      | width      | Width<br />px or %                               | 300px       |
| height     | height     | Height<br />px or %                              | 300px       |
| speed      | speed      | Speed at which the animation plays               | 1           |
| controls   | controls   | Show the controls or not                         | true        |
| autoplay   | autoplay   | Start the animation when it loads                | true        |
| hover      | hover      | Play the animation when the mouse hovers over it | false       |
| loop       | loop       | Loop the animation                               | true        |

`[lottie src="https://assets1.lottiefiles.com/datafiles/HN7OcWNnoqje6iXIiZdWzKxvLIbfeCGTmvXmEm1h/data.json" autoplay=false loop=false speed=5 width="500px" height="200px"]`