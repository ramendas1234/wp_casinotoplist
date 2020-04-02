/**
 *  BLOCK: Casino Toplist Classic
 */

//  Import CSS.
import './editor.css'
//import { registerFormatType } from 'wp-rich-text';
var ALLOWED_MEDIA_TYPES = ['image']
const { __ } = wp.i18n
const { registerBlockType } = wp.blocks
const { RichText,RichTextToolbarButton,MediaUpload} = wp.editor
const { Fragment } = wp.element;
const { registerFormatType } = wp.richText;
const { Button,FormToggle } = wp.components;
//const { BlockControls, AlignmentToolbar,RichTextToolbarButton } = wp.editor;

registerBlockType('casinotoplist/casino-toplist-classic', {
  title: __( 'Casino Toplist Classic' ),
  icon: 'format-aside',
  category: 'casinotoplist',
  keywords: [
    __( 'casino toplist classic' ),
  ],

 

  // Set up data model for custom block
  attributes: {
    imgURL: {
    type: 'string',
    source:'attribute',
    attribute: 'src',
    selector:'img'
    },
    imgID:{
        type:'number'
    },
    imgAlt:{
        type:'string',
        source:'attribute',
        attribute:'alt',
        selector:'img'
    },
    check_all_casino:{
        type:'boolean',
        default:false
    }
  },

  // The UI for the WordPress editor
  edit: props => {
      var check_all = props.attributes.check_all ;
      function onChangeChekAll(state) {
            //(!check_all)?props.setAttributes({check_all: true}):props.setAttributes({check_all: false});
            props.setAttributes({check_all: (!check_all)?true:false});
            
        }
      
     const onFileSelect = (img)=>{
           props.setAttributes({
              imgURL :  img.url,
              imgID : img.id,
              imgAlt: img.alt
           });
          
          //console.log('It is working!');
     }
     const onRemoveImg = () => {
         props.setAttributes({
              imgURL :  null,
              imgID : null,
              imgAlt: null
           });
     }
    return (
            
        <div className="media-wrapper">
                {
                    (props.attributes.imgURL) ? 
                    <div class="img-upload-wrapper">
                    <div className={ props.className }>
                        <img 
                        src={props.attributes.imgURL} 
                        alt={props.attributes.imgAlt}
                        />
                    </div>
                        {(props.isSelected)?( <Button className="button button-primary" onClick={onRemoveImg}>Remove</Button> ):null}
                    </div>
                        
                    : <MediaUpload 
                    onSelect={onFileSelect}
                    value={props.attributes.imgID}
                    render={({open})=>
                    <Button
                    onClick={open}
                    className="button button-primary"
                    >
                    Open Library
                    </Button>
                            }
                />
                }
            <FormToggle 
                checked={check_all}
                onChange={onChangeChekAll}        
            />            
                
                
        </div>
      )
  },

  // The output on the live site
  save: props => {
    return  <div class="img-upload-wrapper">
                        <div class="thumbnail">
                        <img 
                        src={props.attributes.imgURL} 
                        alt={props.attributes.imgAlt}
                        />
                    </div>
                        
            </div>
  }
})
//
//registerFormatType('casinotoplist/casino-toplist-classic', {
//	/* ... */
//	edit( { isActive } ) {
//            alert('fgdfg')
//            function abc(content){
//                console.log('dfsdf');
//            }
//		return (
//			<RichTextToolbarButton
				//icon={// 'editor-code' }
				//title={// 'My formatting button' }
				//onClick={// abc }
				//isActive={// isActive }
				///>//
//		);
//	},
//	/* ... */
//} );