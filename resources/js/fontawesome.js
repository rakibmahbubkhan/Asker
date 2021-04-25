import { library, icon } from '@fortawesome/fontawesome-svg-core'
import { faCaretUp } from '@fortawesome/free-solid-svg-icons'
import { faCaretDown } from '@fortawesome/free-solid-svg-icons'
import { faStar } from '@fortawesome/free-solid-svg-icons'
import { faCheck } from '@fortawesome/free-solid-svg-icons'

library.add(faCaretUp, faCaretDown, faStar, faCheck)

const camera = icon({ prefix: 'fas', iconName: 'caret-up' })



