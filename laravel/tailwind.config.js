/** @type {import('tailwindcss').Config} */
const configs = require('./config')
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    fontFamily: {
      sans: ['Source Sans Pro', 'serif'],
      body: ['Jost', 'sans-serif']
    },
    screens: configs.Screes,
    extend: {
      keyframes: {
        opacity: {
          'from': { opacity: '0' },
          'to': { opacity: '1' }
        }
      },
      animation: {
        opacity: 'opacity 1s ease-in-out'
      },
      maxWidth: configs.maxWidths,
      maxHeight: configs.maxHeights,
      colors: configs.Colors,
      // container: configs.containers,
      backgroundPosition: configs.backgroundPositions,
      backgroundSize: configs.backgroundSizes,
      borderRadius: configs.radiusBorder,
      borderWidth: configs.widthBorder,
      cursor: configs.Cursors,
      fontSize: configs.fontSizes,
      fontWeight: configs.fontWeights,
      letterSpacing: configs.letterSpacings,
      lineHeight: configs.lineHeights,
      listStyleType: configs.listStyleTypes,
      minHeight: configs.minHeights,
      minWidth: configs.minWidths,
      opacity: configs.opacitys,
      order: configs.Orders,
      transformOrigin: configs.transformOrigins,
      transitionDuration: configs.transitionDurations,
      transitionProperty: configs.transitionPropertys,
      transitionTimingFunction: configs.transitionTimingFunctions,
      rotate: configs.rotates,
      scale: configs.scales,
      zIndex: configs.zindexs,
      spacing: configs.spaces,
      inset: configs.insets
    }
  },
  variants: {
    extend: {
      translate: ['motion-safe'],
      display: ['group-hover']
    }

  },
  corePlugins: {
    transform: false,
    container: false,
    backgroundOpacity: true,
    borderOpacity: true,
    textOpacity: true,
    boxShadowOpacity: true,
    objectFit: true,
    objectPosition: true,
    overscrollBehavior: false,
    gridTemplateColumns: true,
    gridColumn: true,
    gridColumnStart: true,
    gridColumnEnd: true,
    gridTemplateRows: true,
    gridRow: true,
    gridRowStart: true,
    gridRowEnd: true,
    gridAutoFlow: true,
    gridAutoColumns: true,
    gridAutoRows: true,
    // space: false,
    // placeholderColor: false,
    // placeholderOpacity: false,
    // borderOpacity: false,
    // divideOpacity: false,
    // divideWidth: false,
    // divideColor: false,
    // gradientColorStops: false,
    boxDecorationBreak: true,
    filter: true,
    blur: false,
    brightness: false,
    contrast: false,
    dropShadow: false,
    grayscale: false,
    hueRotate: false,
    invert: false,
    // scale: false,
    // skew: false,
    translate: false,
    saturate: false,
    boxShadow: true,
    sepia: false,
    backdropFilter: false,
    backdropBlur: false,
    backdropBrightness: false,
    backdropContrast: false,
    backdropGrayscale: false,
    backdropHueRotate: false,
    backdropInvert: false,
    backdropOpacity: false,
    backdropSaturate: false,
    backdropSepia: false,
    isolation: false,
    // ringColor: false,
    // ringOpacity: false,
    // ringOffsetWidth: false,
    // ringOffsetColor: false,
    mixBlendMode: false,
    backgroundBlendMode: false
    // boxShadowColor: false,
    // aspectRatio: false
    // scrollMargin: false
    // scrollPadding: false
    // columns: false
  },
  plugins: [
    function ({ addComponents }) {
      addComponents({
        '.container': {
          width: '100%',
          marginLeft: 'auto',
          marginRight: 'auto',
          paddingLeft: '26px',
          paddingRight: '26px',
          '@screen lg': {
            maxWidth: '1000px',
            paddingLeft: '48px',
            paddingRight: '48px',
          },
          '@screen xl': {
            maxWidth: '1240px',
          },
          '@screen 2xl': {
            maxWidth: '1390px'
          }
        },
        '.container.option-v2': {
          '@screen lg': {
            maxWidth: '1100px',
          }
        }
      })
    }
  ]
}