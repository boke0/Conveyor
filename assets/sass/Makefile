all: style.css

style.css: style.scss
	sass style.scss style.css
	postcss style.css --use autoprefixer -d ../
