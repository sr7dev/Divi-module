// External Dependencies
import React, { Component } from 'react';


class CustomParent extends Component {

  static slug = 'dicm_parent';

  /**
   * Module render in VB
   * Basically DICM_Parent->render() equivalent in JSX
   */
  render() {
    return (
      <div>
        <h2 className="dicm-title">{this.props.title}</h2>
        <div className="dicm-content">{this.props.content}</div>
      </div>
    );
  }
}

export default CustomParent;
