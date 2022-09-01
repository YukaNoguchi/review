// import React from 'react';
// import ChatBot from 'react-simple-chatbot';
// import ChatBot from './components/sample';
// ReactDOM.render(<Chatbot />, document.getElementById('sample'));

import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import ChatBot from 'react-simple-chatbot';

export default class Task extends Component {
  render() {
    return (
      <div>
        <p>タスク</p>
      </div>
    );
  }
}

// export default class Sample extends Component {
//   render() {
//     return (
//       <ChatBot id="sample"
//         headerTitle="チャットbot"
//         recognitionEnable={true}
//         steps={[
//           {
//             id: '1',
//             message: 'お名前は?',
//             trigger: '2',
//           },
//           {
//             id: '2',
//             user: true,
//             trigger: '3',
//           },
//           {
//             id: '3',
//             message: '{previousValue}さん,はじめまして!',
//             end: true,
//           },
//         ]}
//       />
//     )

//   }
// }

// export const Sample = () => {
// return (
//   <ChatBot id="sample"
//     headerTitle="チャットbot"
//     recognitionEnable={true}
//     steps={[
//       {
//         id: '1',
//         message: 'お名前は?',
//         trigger: '2',
//       },
//       {
//         id: '2',
//         user: true,
//         trigger: '3',
//       },
//       {
//         id: '3',
//         message: '{previousValue}さん,はじめまして!',
//         end: true,
//       },
//     ]}
//   />
// )
//}


// if (document.getElementById('sample')) {
//   ReactDOM.render(<Chatbot />, document.getElementById('sample'));
// }

// export const Sample = () => {
//   return (
//     <ChatBot id="sample"
//       headerTitle="チャットbot"
//       recognitionEnable={true}
//       steps={[
//         {
//           id: '1',
//           message: 'お名前は?',
//           trigger: '2',
//         },
//         {
//           id: '2',
//           user: true,
//           trigger: '3',
//         },
//         {
//           id: '3',
//           message: '{previousValue}さん,はじめまして!',
//           end: true,
//         },
//       ]}
//     />
//   )
// }

// export default Sample
