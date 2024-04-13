const { rem, lineHeight } = require('../utils')
const fontSize = {
  xs: [rem(12)],
  sm: [rem(14)],
  base: [rem(16)],
  lg: [rem(18)],
  xl: [rem(20)],
  '2xl': [rem(24)],
  '3xl': [rem(28)],
  '4xl': [rem(32)],
  '5xl': [rem(34)],
  '6xl': [rem(40)],
  'h1': [rem(30), { lineHeight: '1.2' }],
  'h2': [rem(24), { lineHeight: lineHeight(24, 32) }],
  'h3': [rem(20)],
  'h4': [rem(18)],
  'h5': [rem(16)],
  'h6': [rem(14)],
  'h1-md': [rem(40)],
  'h2-md': [rem(36)],
  'h3-md': [rem(32)],
  'h4-md': [rem(28)],
  'h1-lg': [rem(48)],
}
module.exports = {
  fontSize
}
